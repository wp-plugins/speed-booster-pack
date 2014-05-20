<?php

if( !class_exists( 'Speed_Booster_Pack_Options' ) ) {

    class Speed_Booster_Pack_Options {

        private $sbp_options;

/*----------------------------------------------
    Construct the plugin object
-----------------------------------------------*/

    public function __construct() {

        add_action( 'admin_init', array( $this, 'sbp_admin_init' ) );
        add_action( 'admin_menu', array( $this, 'sbp_add_menu' ) );

        }   //  END public function __construct


    public function sbp_admin_init() {

        register_setting( 'speed_booster_settings_group', 'sbp_settings' );

        }  //  END public function admin_init

    public function sbp_add_menu() {

        // Add a page to manage the plugin's settings
        global $sbp_settings_page;
        $sbp_settings_page = add_options_page( 'Speed Booster Options', 'Speed Booster Pack', 'manage_options', 'sbp-options', array( $this, 'sbp_plugin_settings_page' ) );

        }   //  END public function add_menu()


    public function sbp_plugin_settings_page() {

        if( !current_user_can( 'manage_options' ) ) {
            wp_die(__( 'You do not have sufficient permissions to access this page.' ));
        }


/*----------------------------------------------
    Global Variables used on options HTML page
----------------------------------------------*/

        global $sbp_options;

        //  Global variables used to show the front end page speed and processed queries, in plugin options page
        $url = get_site_url();
        $page_time = get_option( 'sbp_page_time' );
        $page_queries = get_option( 'sbp_page_queries' );
        $response = wp_remote_get( $url, array()  );

         // Render the plugin options page HTML
        include( SPEED_BOOSTER_PACK_PATH . 'css/dynamic-css.php' );

        // Render the plugin options page HTML
        include( SPEED_BOOSTER_PACK_PATH . 'inc/template/options.php' );

        } // END public function sbp_plugin_settings_page()


    }   //  END class Speed_Booster_Pack_Options

}   //  END if(!class_exists('Speed_Booster_Pack_Options'))