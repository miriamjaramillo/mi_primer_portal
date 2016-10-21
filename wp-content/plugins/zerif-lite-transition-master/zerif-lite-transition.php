<?php
/**
 * Main plugin file
 *
 * @package   zerif-update-fix
 * @author    Marius Cristea<marius@themeisle.com>
 * @license   GPL-2.0+
 * @copyright 2016 Vertigo Studio SRL
 */
/*
 * Plugin Name: Zerif Lite Transition
 * Description: This plugin is the simple way to get access to Zerif Lite theme updates. The plugin will automatically install the newest version of Zerif Lite theme, so you can get access to updates and safety fixes. It also works with Zerif Lite Child themes, keeping your custom settings untouched.
 * Version: 1.0.0
 *
 *
 */
function zerif_update_fix_load() {
	$theme = wp_get_theme();
	if ( strtolower( $theme->get( 'Name' ) ) == 'zerif lite' || $theme->get_template() == 'zerif-lite' ) {
		$version = $theme->get( 'Version' );
		if ( is_child_theme() ) {
			$theme   = wp_get_theme( $theme->get_template() );
			$version = $theme->get( 'Version' );
		}
		if ( version_compare( $version, '1.8.5.0' ) == - 1 ) {
			require 'license.php';
			$licenser = new ZERIF_FIX_LICENSE( $theme->get( 'Version' ) );
			$licenser->enable();

		}
	};

}

zerif_update_fix_load();

