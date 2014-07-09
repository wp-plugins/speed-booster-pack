<div class="wrap">

<div class="sb-pack">

<h2 class="sbp-icon"><?php echo esc_html( get_admin_page_title() ); ?></h2>

<div class="welcome-panel">

<div class="welcome-panel-content">

<form method="post" action="options.php">

<?php settings_fields( 'speed_booster_settings_group' ); ?>

<h3><?php _e( 'Boost Your Website Speed!', 'sb-pack' ); ?></h3>

<div class="welcome-panel-column-container">

<div class="welcome-panel-column">

<h4><?php _e( 'Main plugin options', 'sb-pack' ); ?></h4>


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
<input id="sbp_settings[lazy_load]" name="sbp_settings[lazy_load]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['lazy_load'] ) ); ?> />
<label for="sbp_settings[lazy_load]"><?php _e( 'Lazy load images to improve page load times', 'sb-pack' ); ?></label>
</p>

<p>
<input id="sbp_settings[font_awesome]" name="sbp_settings[font_awesome]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['font_awesome'] ) ); ?> />
<label for="sbp_settings[font_awesome]"><?php _e( 'Removes extra Font Awesome stylesheets', 'sb-pack' ); ?></label>
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

<p>
<input id="sbp_settings[remove_all_feeds]" name="sbp_settings[remove_all_feeds]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['remove_all_feeds'] ) ); ?> />
<label for="sbp_settings[remove_all_feeds]"><?php _e( 'Remove all rss feed links from WP Head', 'sb-pack' ); ?></label>
</p>

</div> <!-- END welcome-panel-column -->


<div class="welcome-panel-column  welcome-panel-last">

<h4> <?php _e( 'Home Page Load Stats', 'sb-pack' ); ?></h4>

<span class="sbp-stats"><?php _e( 'Page loading time in seconds:', 'sb-pack' ); ?></span>

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

<div class="debug-info">
<strong><?php _e( 'Peak Memory Used:', 'sb-pack' ); ?></strong> <span><?php echo number_format( ( memory_get_peak_usage()/1024/1024 ), 2, ',', '' ) . ' / ' . ini_get( 'memory_limit' ), '<br />'; ?></span>
<strong><?php _e( 'Active Plugins:', 'sb-pack' ); ?></strong> <span><?php echo count( get_option( 'active_plugins' ) ) ; ?></span>
</div>

</div> <!-- END welcome-panel-column  welcome-panel-last -->

</div> <!-- END welcome-panel-column-container -->

<div class="td-border"></div>
<div class="wrap">
<div class="sb-pack">

<h3><?php _e( 'Change the default image compression level', 'sb-pack' ); ?></h3>

<script type='text/javascript'>
jQuery(document).ready(function () {
    jQuery(".sbp-slider").slider({
        value: jpegCompression,
        min: 0,
        max: 100,
        step: 1,
        slide: function (event, ui) {
            jQuery(".sbp-amount").val(ui.value);
            jQuery("#sbp_integer").val(ui.value);
        }
    });
    jQuery(".sbp-amount").val(jQuery(".sbp-slider").slider("value"));
});
</script>
<script type='text/javascript'>
var jpegCompression = '<?php echo $this->image_compression; ?>';
</script>

<div>

<p class="sbp-amount">
<?php _e( 'Compression level:', 'sb-pack' ); ?><input type="text" class="sbp-amount" id="sbp-amount" />
</p>

<p>
<div class="sbp-slider" id="sbp-slider"></div>
<input type="hidden" name="sbp_integer" id="sbp_integer" value="<?php echo $this->image_compression; ?>" />
</p>

<p class="description">
<?php _e( 'The default image compression setting in WordPress is 90%. Compressing your images further than the default will make your file sizes even smaller and will boost your site performance.', 'sb-pack' ); ?><br />
<?php _e( 'Note that any changes you make will only affect new images uploaded to your site. If you want to update all of your images with the new sizes, install and run the Regenerate Thumbnails plugin. As a reference, a lower level of compression means more performance. We recommend you choose a compression level between 50 and 75.', 'sb-pack' ); ?>
</p>

</div>

<div class="td-border-last"></div>

<h3 class="td-margin"><?php _e( 'Still need more speed?', 'sb-pack' ); ?></h3>

<p>
<input id="sbp_css_async" name="sbp_settings[sbp_css_async]" type="checkbox" value="1"  <?php checked( 1, isset( $sbp_options['sbp_css_async'] ) ); ?> />
<label for="sbp_css_async"><?php _e( 'Load CSS asynchronously', 'sb-pack' ); ?></label>
</p>


<div id="sbp-css-content">

<p>
<input id="sbp_settings[sbp_css_minify]" name="sbp_settings[sbp_css_minify]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['sbp_css_minify'] ) ); ?> />
<label for="sbp_settings[sbp_css_minify]"><?php _e( 'Minify all CSS styles', 'sb-pack' ); ?></label>
</p>

<div class="sbp-radio-content">

<p>
<input id="sbp_settings[sbp_footer_css]" name="sbp_settings[sbp_footer_css]" type="checkbox" value="1" <?php checked( 1, isset( $sbp_options['sbp_footer_css'] ) ); ?> />
<label for="sbp_settings[sbp_footer_css]"><?php _e( 'Insert all CSS styles inline to the footer', 'sb-pack' ); ?></label>
</p>

<p class ="description"><?php _e( '*Inserting all CSS styles inline to the footer will eliminate render-blocking CSS warning in Google Page Speed test. If there is something broken after activation, you need to disable this option. Please note that before enabling this sensitive option, it is strongly recommended that you also enable the "Move scripts to the footer" option.', 'sb-pack' ); ?>
</p>

</div><!-- END sbp-radio-content -->
</div><!-- END sbp-css-content -->

</div><!-- END sb-pack -->
</div><!-- END wrap -->

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

<p><a href="http://tiguandesign.com/docs/speed-booster/" target="_blank" title="Documentation"><?php _e( 'Read online plugin documentation', 'sb-pack' ); ?></a><?php _e( ' with guidelines to enhance your website performance.', 'sb-pack' ); ?></p>

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

<script>
    if (typeof (jQuery) != 'undefined') {
        jQuery(document).ready(function () {
            validate();
            jQuery('input').change(function () {
                validate();
            })
        });

        function validate() {
            if (jQuery('input[id=sbp_css_async]').is(':checked')) {
                jQuery('#sbp-css-content').show();
            } else {
                jQuery('#sbp-css-content').hide();
            }
        }
    }
</script>