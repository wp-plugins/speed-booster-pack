<?php
/**
* Plugin Name: Speed Booster Pack
* Plugin URI: http://wordpress.org/plugins/speed-booster-pack/
* Description: Speed Booster Pack allows you to improve your page loading speed and get a higher score on the major speed testing services such as <a href="http://gtmetrix.com/">GTmetrix</a>, <a href="http://developers.google.com/speed/pagespeed/insights/">Google PageSpeed</a> or other speed testing tools.
* Version: 1.5
* Author: Tiguan
* Author URI: http://tiguandesign.com
* License: GPLv2
*/

/*  Copyright 2014 Tiguan (email : themesupport [at] tiguandesign [dot] com)

    THIS PROGRAM IS FREE SOFTWARE; YOU CAN REDISTRIBUTE IT AND/OR MODIFY
    IT UNDER THE TERMS OF THE GNU GENERAL PUBLIC LICENSE AS PUBLISHED BY
    THE FREE SOFTWARE FOUNDATION; EITHER VERSION 2 OF THE LICENSE, OR
    (AT YOUR OPTION) ANY LATER VERSION.

    THIS PROGRAM IS DISTRIBUTED IN THE HOPE THAT IT WILL BE USEFUL,
    BUT WITHOUT ANY WARRANTY; WITHOUT EVEN THE IMPLIED WARRANTY OF
    MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE.  SEE THE
    GNU GENERAL PUBLIC LICENSE FOR MORE DETAILS.

    YOU SHOULD HAVE RECEIVED A COPY OF THE GNU GENERAL PUBLIC LICENSE
    ALONG WITH THIS PROGRAM; IF NOT, WRITE TO THE FREE SOFTWARE
    FOUNDATION, INC., 51 FRANKLIN ST, FIFTH FLOOR, BOSTON, MA  02110-1301  USA
*/

/*----------------------------------------------
	Global Variables
----------------------------------------------*/

$sbp_options = get_option( 'sbp_settings', 'checked' );	// retrieve the plugin settings from the options table

/*----------------------------------------------
	Define some useful plugin constants
----------------------------------------------*/

define( 'SPEED_BOOSTER_PACK_RELEASE_DATE', date_i18n( 'F j, Y', '1400569200' ) );	// Defining plugin release date
define( 'SPEED_BOOSTER_PACK_PATH', plugin_dir_path( __FILE__ ) );					// Defining plugin dir path
define( 'SPEED_BOOSTER_PACK_VERSION', 'v1.5');										// Defining plugin version


/*----------------------------------------------
	Main Plugin Class
----------------------------------------------*/

	if ( !class_exists( 'Speed_Booster_Pack' ) ) {

		class Speed_Booster_Pack {


/*----------------------------------------------
	Function Construct
----------------------------------------------*/

	public function __construct() {

		// Load plugin settings page
		require_once( SPEED_BOOSTER_PACK_PATH . 'inc/settings.php' );
		$Speed_Booster_Pack_Options = new Speed_Booster_Pack_Options();

		// Load main plugin functions
		require_once( SPEED_BOOSTER_PACK_PATH . 'inc/core.php' );
		$Speed_Booster_Pack_Core = new Speed_Booster_Pack_Core();

		// load plugin textdomain
		load_plugin_textdomain( 'sb-pack', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );

		// Enqueue admin style
		add_action( 'admin_enqueue_scripts',  array( $this, 'sbp_enqueue_styles' ) );

		// Enqueue frontend scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'sbp_enqueue_scripts' ) );

		// Filters
		$this->path = plugin_basename( __FILE__ );
		add_filter( "plugin_action_links_$this->path", array( $this, 'sbp_settings_link' ) );

		}	// END public function __construct


/*----------------------------------------------
	Activate the plugin
----------------------------------------------*/

	public static function activate() {

		$timer_stop = timer_stop( 0, 2 );
		$get_num_queries = get_num_queries();

		if (get_option('sbp_page_time') == '') {
			update_option( 'sbp_page_time', $timer_stop );
		}

		if (get_option('sbp_page_queries') == '') {
			update_option( 'sbp_page_queries', $get_num_queries );
		}

	} // END public static function activate


/*----------------------------------------------
	Deactivate the plugin
----------------------------------------------*/

	public static function deactivate() {
			// Nothing to do yet
		} // END public static function deactivate


/*----------------------------------------------
	CSS style of the plugin options page
----------------------------------------------*/

	function sbp_enqueue_styles( $hook ) {

		// load stylesheet only on plugin options page
		global $sbp_settings_page;
		if ( $hook != $sbp_settings_page )
			return;
		wp_enqueue_style( 'sbp-styles', plugin_dir_url( __FILE__ ) . 'css/sbp_style.min.css' );	//	change to style.dev.css to debug your plugin style

		}	//	End function sbp_enqueue_styles


/*----------------------------------------------
	Enqueue Lazy Load scripts
----------------------------------------------*/

	static function sbp_enqueue_scripts() {

		if ( !is_admin() and isset( $sbp_options['lazy_load'] ) ) {

			wp_enqueue_script( 'sbp-lazy-load-images',  plugin_dir_url( __FILE__ ) . 'js/sbp-lazy-load.js', array( 'jquery', 'sbp-jquery-sonar' ), SPEED_BOOSTER_PACK_VERSION, true );
			wp_enqueue_script( 'sbp-jquery-sonar',  plugin_dir_url( __FILE__ ) . 'js/jquery.sonar.min.js', array( 'jquery' ), SPEED_BOOSTER_PACK_VERSION, true );
		}
	}

/*----------------------------------------------
	Add settings link on plugins page
----------------------------------------------*/

	function sbp_settings_link( $links ) {

		$settings_link = '<a href="options-general.php?page=sbp-options">Settings</a>';
		array_unshift( $links, $settings_link );
		return $links;

		}	//	End function sbp_settings_link


	}	//	End class Speed_Booster_Pack

}	//	End if (!class_exists("Speed_Booster_Pack")) (1)

if( class_exists( 'Speed_Booster_Pack' ) ) {

	// Installation and uninstallation hooks
	register_activation_hook( __FILE__, array( 'Speed_Booster_Pack', 'activate' ) );
	register_deactivation_hook( __FILE__, array( 'Speed_Booster_Pack', 'deactivate' ) );

	// instantiate the plugin class
	$speed_booster_pack = new Speed_Booster_Pack();

}	//	End if (!class_exists("Speed_Booster_Pack")) (2)