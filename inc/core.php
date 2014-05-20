<?php

if( !class_exists( 'Speed_Booster_Pack_Core' ) ) {

	class Speed_Booster_Pack_Core {


		public function __construct() {

			global $sbp_options;

			add_action( 'wp_enqueue_scripts', array( $this, 'sbp_move_scripts_to_footer' ) );
			add_action( 'wp_footer', array( $this, 'sbp_show_page_load_stats' ), 999 );
			add_action('after_setup_theme', array( $this, 'sbp_junk_header_tags' ) );

			//	Use Google Libraries
			if ( !is_admin() and isset( $sbp_options['use_google_libs'] ) ) {
				$this->sbp_use_google_libraries();
			}

			//	Defer parsing of JavaScript
			if ( !is_admin() and isset( $sbp_options['defer_parsing'] ) ) {
				add_filter( 'clean_url', array( $this, 'sbp_defer_parsing_of_js' ), 11, 1 );
			}

			//	Remove query strings from static resources
			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
			 add_filter( 'script_loader_src', array( $this, 'sbp_remove_query_strings_1' ), 15, 1 );
			}

			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
				add_filter( 'style_loader_src', array( $this, 'sbp_remove_query_strings_1' ), 15, 1 );
			}

			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
			 add_filter( 'script_loader_src', array( $this, 'sbp_remove_query_strings_2' ), 15, 1 );
			}

			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
				add_filter( 'style_loader_src', array( $this, 'sbp_remove_query_strings_2' ), 15, 1 );
			}

			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
				add_filter( 'script_loader_src', array( $this, 'sbp_remove_query_strings_3' ), 15, 1 );
			}

			if ( !is_admin() and isset( $sbp_options['query_strings'] ) ) {
				add_filter( 'style_loader_src', array( $this, 'sbp_remove_query_strings_3' ), 15, 1 );
			}

		}  //  END public public function __construct


/*--------------------------------------------------------------------------------------------------------
    Moves scripts to the footer to decrease page load times, while keeping stylesheets in the header
---------------------------------------------------------------------------------------------------------*/

function sbp_move_scripts_to_footer() {

	global $sbp_options;

	if ( !is_admin() and isset( $sbp_options['jquery_to_footer'] ) ) {

		remove_action( 'wp_head', 'wp_print_scripts' );
		remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
		remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

	}

}	//  END function sbp_move_scripts_to_footer


/*----------------------------------------------
    Show Number of Queries and Page Load Time
-----------------------------------------------*/

function sbp_show_page_load_stats() {
	$timer_stop = timer_stop( 0, 2 );	//	to display milliseconds instead of seconds usethe following:	$timer_stop = 1000 * ( float ) timer_stop( 0, 4 );
	$get_num_queries = get_num_queries();
	update_option( 'sbp_page_time', $timer_stop );
	update_option( 'sbp_page_queries', $get_num_queries );
}


/*----------------------------------------------
    Use Google Libraries
-----------------------------------------------*/

function sbp_use_google_libraries() {

		require_once( SPEED_BOOSTER_PACK_PATH . 'inc/use-google-libraries.php' );

		if ( class_exists( 'JCP_UseGoogleLibraries' ) ) {
			JCP_UseGoogleLibraries::configure_plugin();

		}

}	//	End function sbp_use_google_libraries()


/*----------------------------------------------
    Defer parsing of JavaScript
-----------------------------------------------*/

function sbp_defer_parsing_of_js ( $url ) {

	if ( FALSE === strpos( $url, '.js' ) ) {
		return $url;
	}

	if ( strpos( $url, 'jquery.js' ) ) {
		return $url;
	}

	return "$url' defer='defer";

}	//	END function sbp_defer_parsing_of_js


/*----------------------------------------------
    Remove query strings from static resources
-----------------------------------------------*/

function sbp_remove_query_strings_1( $src ) {	//	remove "?ver" string
$rqsfsr = explode( '?ver', $src );
return $rqsfsr[0];
}

function sbp_remove_query_strings_2( $src ) {	//	remove "&ver" string
$rqsfsr = explode( '&ver', $src );
return $rqsfsr[0];
}

function sbp_remove_query_strings_3( $src ) {	//	remove "?rev" string from Revolution Slider plugin
$rqsfsr = explode( '?rev', $src );
return $rqsfsr[0];
}


/*----------------------------------------------
    Remove junk header tags
-----------------------------------------------*/

public function sbp_junk_header_tags() {

	global $sbp_options;

	//	Remove RSD Link from header
	if ( isset( $sbp_options['remove_rsd_link'] ) ) {
		remove_action( 'wp_head', 'rsd_link' );
	}

	//	Remove Adjacent Posts links PREV/NEXT
	if ( isset( $sbp_options['remove_adjacent'] ) ) {
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	}

	//	Remove Windows Live Writer Manifest Link
	if ( isset( $sbp_options['wml_link'] ) ) {
		remove_action( 'wp_head', 'wlwmanifest_link' );
	}

	//	Remove WordPress Shortlinks from WP Head
	if ( isset( $sbp_options['remove_wsl'] ) ) {
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	}

}	//	END public function sbp_junk_header_tags


	}   //  END class Speed_Booster_Pack_Core

}   //  END if(!class_exists('Speed_Booster_Pack_Core'))