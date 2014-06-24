<div class="wrap">

    <div class="sb-pack">

        <h2 class="sbp-icon"><?php echo esc_html( get_admin_page_title() ); ?></h2>

        <div class="welcome-panel">

            <div class="welcome-panel-content">

                <form method="post" action="options.php">

                    <?php settings_fields( 'speed_booster_settings_group' ); ?>

                    <h3><?php _e( 'Speed Up Your Website!', 'sb-pack' ); ?></h3>

                    <div class="welcome-panel-column-container">

                        <div class="welcome-panel-column">

                            <h4><?php _e( 'Javascripts options', 'sb-pack' ); ?></h4>

                            <p>
                             <input id="sbp_settings[jquery_to_footer]" name="sbp_settings[jquery_to_footer]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['jquery_to_footer'] ) ); ?> />
                             <label for="sbp_settings[jquery_to_footer]"><?php _e( 'Move scripts to the footer', 'sb-pack' ); ?></label>
                         </p>

                         <p>
                            <input id="sbp_settings[use_google_libs]" name="sbp_settings[use_google_libs]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['use_google_libs'] ) ); ?> />
                            <label for="sbp_settings[use_google_libs]"><?php _e( 'Load JS from Google Libraries', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[defer_parsing]" name="sbp_settings[defer_parsing]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['defer_parsing'] ) ); ?> />
                            <label for="sbp_settings[defer_parsing]"><?php _e( 'Defer parsing of javascript files', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[query_strings]" name="sbp_settings[query_strings]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['query_strings'] ) ); ?> />
                            <label for="sbp_settings[query_strings]"><?php _e( 'Remove query strings from static resources', 'sb-pack' ); ?></label>
                        </p>

                         <p>
                            <input id="sbp_settings[font_awesome]" name="sbp_settings[font_awesome]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['font_awesome'] ) ); ?> />
                            <label for="sbp_settings[font_awesome]"><?php _e( 'Removes additional Font Awesome stylesheets', 'sb-pack' ); ?></label>
                        </p>

                          <p>
                            <input id="sbp_settings[lazy_load]" name="sbp_settings[lazy_load]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['lazy_load'] ) ); ?> />
                            <label for="sbp_settings[lazy_load]"><?php _e( 'Lazy load images to improve page load times', 'sb-pack' ); ?></label>
                        </p>

                    </div> <!-- END welcome-panel-column -->


                    <div class="welcome-panel-column">
                        <h4> <?php _e( 'Remove junk header tags', 'sb-pack' ); ?></h4>

                        <p>
                            <input id="sbp_settings[remove_rsd_link]" name="sbp_settings[remove_rsd_link]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['remove_rsd_link'] ) ); ?> />
                            <label for="sbp_settings[remove_rsd_link]"><?php _e( 'Remove RSD Link', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[remove_wsl]" name="sbp_settings[remove_wsl]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['remove_wsl'] ) ); ?> />
                            <label for="sbp_settings[remove_wsl]"><?php _e( 'Remove WordPress Shortlink', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[remove_adjacent]" name="sbp_settings[remove_adjacent]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['remove_adjacent'] ) ); ?> />
                            <label for="sbp_settings[remove_adjacent]"><?php _e( 'Remove Adjacent Posts Links', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[wml_link]" name="sbp_settings[wml_link]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['wml_link'] ) ); ?> />
                            <label for="sbp_settings[wml_link]"><?php _e( 'Remove Windows Live Writer Manifest', 'sb-pack' ); ?></label>
                        </p>

                        <p>
                            <input id="sbp_settings[wp_generator]" name="sbp_settings[wp_generator]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['wp_generator'] ) ); ?> />
                            <label for="sbp_settings[wp_generator]"><?php _e( 'Remove the WordPress Version Number', 'sb-pack' ); ?></label>
                        </p>

                    </div> <!-- END welcome-panel-column -->


                    <div class="welcome-panel-column  welcome-panel-last">

                        <h4> <?php _e( 'Page Load Stats', 'sb-pack' ); ?></h4>

                        <span class="sbp-stats"><?php _e( 'Page loading time:', 'sb-pack' ); ?></span>

                        <div class="sbp-progress time">
                            <span></span>
                        </div>

                        <div class="sbp-values">
                            <div class="sbp-numbers">
                                <?php echo $page_time; ?> <?php _e( 's', 'sb-pack' ); ?>
                            </div>
                        </div>

                        <span class="sbp-stats"><?php _e( 'Number of executed queries:', 'sb-pack' ); ?></span>

                        <div class="sbp-progress queries">
                            <span></span>
                        </div>

                        <div class="sbp-values">
                            <div class="sbp-numbers">
                                <?php echo $page_queries; ?> <?php _e( 'q', 'sb-pack' ); ?>
                            </div>
                        </div>

                    </div> <!-- END welcome-panel-column  welcome-panel-last -->

                </div> <!-- END welcome-panel-column-container -->

                <?php submit_button() ?>

            </form>

        </div> <!-- END welcome-panel-content -->

    </div> <!-- END welcome-panel -->

 <!-- START docs and version areas -->

    <div class="sbp-title-div">
        <div class="sbp-title">
            <?php _e( 'What do these settings mean?', 'sb-pack' ); ?>
        </div>
    </div>

    <div class="sbp-box"><!-- start sbp-box div 1 -->

        <div class="sbp-box-legend">
            <i class="sbp-icon-help"></i>
        </div>

        <p><a href="http://tiguandesign.com/docs/speed-booster/" target="_blank" title="Documentation"><?php _e( 'Read online plugin documentation', 'sb-pack' ); ?></a><?php _e( ' with guidelines to modify/enhance your website.', 'sb-pack' ); ?></p>

    </div> <!-- end sbp-box div 1-->

    <div class="sbp-title-div">
        <div class="sbp-title">
            <?php _e( 'Version Information', 'sb-pack' ); ?>
        </div>
    </div>

    <div class="sbp-box"><!-- start sbp-box div 2 -->

        <div class="sbp-box-version">
            <i class="sbp-icon-version"></i>
        </div>

        <div class="sbp-infos">
            <?php _e( 'Installed Version:', 'sb-pack' ); ?>
            <span>
                <?php echo SPEED_BOOSTER_PACK_VERSION; ?>
            </span>
        </div>

        <div class="sbp-infos">
            <?php _e( 'Released date:', 'sb-pack' ); ?>
            <span>
                <?php echo SPEED_BOOSTER_PACK_RELEASE_DATE; ?>
            </span>
        </div>

    </div> <!-- end sbp-box div 2 -->

 <!-- END docs and version areas -->

</div> <!-- END sb-pack-->

</div> <!-- end wrap div -->