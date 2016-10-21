<?php

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 99);
remove_filter( 'the_content', 'wpautop' );

function child_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/custom.css', array($parent_style));
}

if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value; // prevent update to child theme mods
    }, 10, 2);
    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}

/* * **************************************** */
/* * ***********  NUEVA SECCIÓN  ************ */
/* * **************************************** */

function caribdis_customizer($wp_customize) {
    $wp_customize->add_panel('panel_newsection', array(
        'priority' => 32,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Nueva Sección', 'zerif-lite')
    ));
    $wp_customize->add_section('zerif_newsection_section', array(
        'title' => __('Contenido', 'zerif-lite'),
        'priority' => 1,
        'panel' => 'panel_newsection',
        'description' => __('El contenido principal de esta sección se puede personalizar desde el menú Personalizar -> Widgets. Allí podrá añadir cualquier widget.', 'zerif-lite')
    ));
    /* show/hide */
    $wp_customize->add_setting('zerif_newsection_show', array('sanitize_callback' => 'caribdis_sanitize_customizer'));
    $wp_customize->add_control(
            'zerif_newsection_show', array(
        'type' => 'checkbox',
        'label' => __('¿Ocultar nueva sección?', 'zerif-lite'),
        'section' => 'zerif_newsection_section',
        'priority' => 1,
            )
    );
    /* new_section title */
    $wp_customize->add_setting('zerif_newsection_title', array('sanitize_callback' => 'caribdis_sanitize_customizer', 'default' => __('NUEVA SECCIÓN', 'zerif-lite')));

    $wp_customize->add_control('zerif_newsection_title', array(
        'label' => __('Title', 'zerif-lite'),
        'section' => 'zerif_newsection_section',
        'settings' => 'zerif_newsection_title',
        'priority' => 2,
    ));
    /* new_section subtitle */
    $wp_customize->add_setting('zerif_newsection_subtitle', array('sanitize_callback' => 'caribdis_sanitize_customizer', 'default' => __('Escriba la descripción de esta sección aquí.', 'zerif-lite')));
    $wp_customize->add_control('zerif_newsection_subtitle', array(
        'label' => __('Subtítulo de la nueva sección', 'zerif-lite'),
        'section' => 'zerif_newsection_section',
        'settings' => 'zerif_newsection_subtitle',
        'priority' => 3,
    ));
}

add_action('customize_register', 'caribdis_customizer');

function caribdis_sanitize_customizer($input) {
    return wp_kses_post(force_balance_tags($input));
}

function caribdis_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

function new_section_widgets() {
    register_sidebar(array(
        'name' => __('Barra lateral de nueva sección', 'zerif-lite'),
        'id' => 'new-section-sidebar',
        'description' => __('Widgets para la nueva sección', 'zerif-lite'),
        'before_widget' => '<div class="col-lg-3"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'new_section_widgets');
?>