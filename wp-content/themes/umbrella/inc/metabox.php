<?php

add_action( 'cmb2_admin_init', 'fab_register_repeatable_group_field_metabox' );

function fab_register_repeatable_group_field_metabox() {
	$prefix = 'fab_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Slider configuration', 'cmb2' ),
		'object_types' => array( 'slider', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => __( 'Add slide items for the slider', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Slide item {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Slide item', 'cmb2' ),
			'remove_button' => __( 'Remove Slide item', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Slide Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Slide Description', 'cmb2' ),
		'description' => __( 'Write a short description for this entry', 'cmb2' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Slide Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );

    $cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Slide Link', 'cmb2' ),
		'id'         => 'link',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

}


add_action( 'cmb2_admin_init', 'fab_services_metabox' );


function fab_services_metabox() {
	$prefix = 'fab_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_meta = new_cmb2_box( array(
		'id'            => $prefix . 'services',
		'title'         => __( 'Services details', 'cmb2' ),
		'object_types'  => array( 'fab_service', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		 'context'    => 'side',
		 'priority'   => 'default',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_meta->add_field( array(
		'name'       => __( 'Service Icon', 'cmb2' ),
		'desc'       => __( 'Select an icon matching your service', 'cmb2' ),
		'id'         => $prefix . 'icon',
		'type'       => 'fontawesome_icon',
	) );
}


add_action( 'cmb2_admin_init', 'fab_staff_metabox' );


function fab_staff_metabox() {
	$prefix = 'fab_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_meta = new_cmb2_box( array(
		'id'            => $prefix . 'staff',
		'title'         => __( 'Staff details', 'cmb2' ),
		'object_types'  => array( 'staff', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		 'context'    => 'advanced',
		 'priority'   => 'default',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_description',
		'type' => 'textarea',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Job title', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_title',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Experience', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_experience',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Twitter', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_twitter',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Facebook', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_facebook',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'Google Plus', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_gplus',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_meta->add_field( array(
		'name' => __( 'LinkedIn', 'cmb2' ),
		//'desc' => __( 'Staff job title', 'cmb2' ),
		'id'   => $prefix . 'job_linkedin',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

}
