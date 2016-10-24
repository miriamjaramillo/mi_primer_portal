
<section class="our-team" id="quienes_somos">
<div class="container">
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION TITLE -->
        <?php
          global $wp_customize; 
          $zerif_newsection_title = get_theme_mod('zerif_newsection_title',__('NUEVA SECCIÓN','zerif-lite')); 
          if( !empty($zerif_newsection_title) ): 
          echo '<h2 class="dark-text">'.wp_kses_post( $zerif_newsection_title ).'</h2>'; 
          elseif ( isset( $wp_customize ) ):
          echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
          endif;
          $zerif_newsection_subtitle = get_theme_mod('zerif_newsection_subtitle',__('Subtítulo de la nueva sección.','zerif-lite'));
          if( !empty($zerif_newsection_subtitle) ):
          echo '<div class="section-legend">'.wp_kses_post( $zerif_newsection_subtitle ).'</div>';
          elseif ( isset( $wp_customize ) ): 
          echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
          endif;
        ?>
    </div>
    <div class="row">
            <?php
            if ( is_active_sidebar( 'new-section-sidebar' ) ) :
                dynamic_sidebar( 'new-section-sidebar' );
            else:
		//the_widget( 'zerif_ourfocus','text=Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations' );
                $zerif_newsection_text = get_theme_mod('zerif_newsection_text', 'La Cooperativa de Ahorro y Crédito "El Comerciante" Ltda., es una organización jurídica que se encuentra legalmente constituida en el país, en la provincia de Loja, cantón Saraguro; realiza actividades de intermediación financiera, con sujeción a las regulaciones y a los principios reconocidos en la Ley Orgánica de la Economía Popular y Solidaria y del Sector Financiero Popular y Solidario, a su Reglamento General, a las Resoluciones de la Superintendencia de Economía Popular y Solidaria y del ente regulador.');
                $zerif_newsection_firm = get_theme_mod('zerif_newsection_firm', '');
                if (!empty($zerif_newsection_text)):
                    echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center ' . $text_and_skills . '" data-scrollreveal="enter bottom after 0s over 1s">';
                    echo '<p>';
                    echo wp_kses_post($zerif_newsection_text);
                    echo '</p>';
                    echo '</div>';
                endif;
            endif;
            ?>
    </div>
</div> <!-- / END CONTAINER -->
</section>  <!-- / END NUEVA SECCION -->