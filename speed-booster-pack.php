<?php
/**
* Plugin Name: Speed Booster Pack
* Plugin URI: http://wordpress.org/plugins/speed-booster-pack/
* Description: Speed Booster Pack allows you to improve your page loading speed and get a higher score on the major speed testing services such as <a href="http://gtmetrix.com/">GTmetrix</a>, <a href="http://developers.google.com/speed/pagespeed/insights/">Google PageSpeed</a> or other speed testing tools.
* Version: 1.7
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

/*----------------------------------------------------------------------------------------------------------
	Global Variables
-----------------------------------------------------------------------------------------------------------*/

$sbp_options = get_option( 'sbp_settings', 'checked' );	// retrieve the plugin settings from the options table

/*----------------------------------------------------------------------------------------------------------
	Define some useful plugin constants
-----------------------------------------------------------------------------------------------------------*/

define( 'SPEED_BOOSTER_PACK_RELEASE_DATE', date_i18n( 'F j, Y', '1400569200' ) );	// Defining plugin release date
define( 'SPEED_BOOSTER_PACK_PATH', plugin_dir_path( __FILE__ ) );					// Defining plugin dir path
define( 'SPEED_BOOSTER_PACK_VERSION', 'v1.7');										// Defining plugin version
define( 'SPEED_BOOSTER_PACK_NAME', 'Speed Booster Pack Plugin');					// Defining plugin name


/*----------------------------------------------------------------------------------------------------------
	Main Plugin Class
-----------------------------------------------------------------------------------------------------------*/

	if ( !class_exists( 'Speed_Booster_Pack' ) ) {

		class Speed_Booster_Pack {


/*----------------------------------------------------------------------------------------------------------
	Function Construct
-----------------------------------------------------------------------------------------------------------*/

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

		// Render debugging information
		add_action( 'wp_footer', array( $this, 'sbp_debugg' ), 999 );

		// Filters
		$this->path = plugin_basename( __FILE__ );
		add_filter( "plugin_action_links_$this->path", array( $this, 'sbp_settings_link' ) );

		}	// END public function __construct


/*----------------------------------------------------------------------------------------------------------
	Activate the plugin
-----------------------------------------------------------------------------------------------------------*/

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


/*----------------------------------------------------------------------------------------------------------
	Deactivate the plugin
-----------------------------------------------------------------------------------------------------------*/

	public static function deactivate() {
			// Nothing to do yet
		} // END public static function deactivate


/*----------------------------------------------------------------------------------------------------------
	CSS style of the plugin options page
-----------------------------------------------------------------------------------------------------------*/

	function sbp_enqueue_styles( $hook ) {

		// load stylesheet only on plugin options page
		global $sbp_settings_page;
		if ( $hook != $sbp_settings_page )
			return;
		wp_enqueue_style( 'sbp-styles', plugin_dir_url( __FILE__ ) . 'css/sbp_style.min.css' );	//	change to style.dev.css to debug your plugin style

		}	//	End function sbp_enqueue_styles


/*----------------------------------------------------------------------------------------------------------
	Enqueue Lazy Load scripts
-----------------------------------------------------------------------------------------------------------*/

	static function sbp_enqueue_scripts() {

		global $sbp_options;

		if ( !is_admin() and isset( $sbp_options['lazy_load'] ) ) {

			// We combined 'jquery.sonar.js' and 'lazy-load.js' (commented out below) in a single minified file to reduce the number of js files.
			wp_enqueue_script( 'sbp-lazy-load-images',  plugin_dir_url( __FILE__ ) . 'js/sbp-lazy-load.min.js', array( 'jquery' ), SPEED_BOOSTER_PACK_VERSION, true );

			// wp_enqueue_script( 'sbp-lazy-load-images',  plugin_dir_url( __FILE__ ) . 'js/lazy-load.js', array( 'jquery', 'sbp-jquery-sonar' ), SPEED_BOOSTER_PACK_VERSION, true );
			// wp_enqueue_script( 'sbp-jquery-sonar',  plugin_dir_url( __FILE__ ) . 'js/jquery.sonar.js', array( 'jquery' ), SPEED_BOOSTER_PACK_VERSION, true );
		}
	}

/*----------------------------------------------------------------------------------------------------------
	Add settings link on plugins page
-----------------------------------------------------------------------------------------------------------*/

	function sbp_settings_link( $links ) {

		$settings_link = '<a href="options-general.php?page=sbp-options">Settings</a>';
		array_unshift( $links, $settings_link );
		return $links;

		}	//	End function sbp_settings_link


/*----------------------------------------------------------------------------------------------------------
	Render the plugin name, its version and active options in page source, useful for debugging
-----------------------------------------------------------------------------------------------------------*/

		function sbp_debugg() {

			global $sbp_options;

			echo '<!-- We need this for debugging themes using ' . SPEED_BOOSTER_PACK_NAME . ' ' . SPEED_BOOSTER_PACK_VERSION . ' -->' . "\n";

			if ( isset( $sbp_options['jquery_to_footer'] ) ) {
				echo '<!-- Move scripts to the footer: active -->' . "\n";
			}	//	End if

			if ( isset( $sbp_options['use_google_libs'] ) ) {
				echo '<!-- Load JS from Google Libraries: active -->' . "\n";
			}	//	End if

			if ( isset( $sbp_options['defer_parsing'] ) ) {
				echo '<!-- Defer parsing of javascript files: active -->' . "\n";
			}	//	End if

			if ( isset( $sbp_options['query_strings'] ) ) {
				echo '<!-- Remove query strings from static resources: active -->' . "\n";
			}	//	End if

			if ( isset( $sbp_options['lazy_load'] ) ) {
				echo '<!-- Lazy load images to improve page load times: active -->' . "\n";
			}	//	End if

			if ( isset( $sbp_options['font_awesome'] ) ) {
				echo '<!-- Removes additional Font Awesome stylesheets: active -->' . "\n";
			}	//	End if

		}	//	End function sbp_debugg

	}	//	End class Speed_Booster_Pack

}	//	End if (!class_exists("Speed_Booster_Pack")) (1)

if( class_exists( 'Speed_Booster_Pack' ) ) {

	// Installation and uninstallation hooks
	register_activation_hook( __FILE__, array( 'Speed_Booster_Pack', 'activate' ) );
	register_deactivation_hook( __FILE__, array( 'Speed_Booster_Pack', 'deactivate' ) );

	// instantiate the plugin class
	$speed_booster_pack = new Speed_Booster_Pack();

}	//	End if (!class_exists("Speed_Booster_Pack")) (2)