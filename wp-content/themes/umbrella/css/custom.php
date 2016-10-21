<?php
	header("Content-type: text/css;");

	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles
	$primary 		= ft_of_get_option('fabthemes_primary_color','#0496ea');
	$secondary		= ft_of_get_option('fabthemes_secondary_color','#f1f2f3');
	$link 			= ft_of_get_option('fabthemes_link_color','#228ecc');
	$hover 			= ft_of_get_option('fabthemes_hover_color','#0d58bc');
?>

.top-menu .main-navigation .current_page_item > a,
.top-menu .main-navigation .current-menu-item > a,
.top-menu .main-navigation .current_page_ancestor > a,
.top-menu .main-navigation .current-menu-ancestor > a,
.top-menu .main-navigation ul > li a:hover,
.top-menu .main-navigation li:hover > a,
.top-menu .main-navigation li.focus > a,
.top-menu .main-navigation ul ul,
#top-bar,
.home-service-item span,
a.cbutton,
#home-staff .home-staff-item:hover .staff-info,
#page-staff .home-staff-item:hover .staff-info,
#home-map-section .info-box,
#home-map-section:after,
.page-header h1 span,
.entry-header .date-field,
.button:hover, .button:focus,
#home-slider .slides li .slide-caption h2{
    background: <?php echo $primary ?>;
}

#home-staff .home-staff-item .staff-info .staff-title,
#page-staff .home-staff-item .staff-info .staff-title,
#home-news .section-side-title h2,
.section-title h2,
.entry-header .entry-meta span i{
	color: <?php echo $primary ?>;
}

#masthead,
#home-testimonials,
#home-staff,
.site-footer{
    background: <?php echo $secondary ?>;
}


/* Links */

a:link, a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}
