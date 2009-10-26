<?php
/*
Plugin Name: Hackadelic WordPress Tweaks - Basic Edition
Version: 1.0
Description: Several blog tweaks bundled in one streamlined plugin for maximum performance. Enables the built-in syntax coloring editor and shortcodes in sidebars. <em>More tweaks can be added online with the <a href="http://hackadelic.com/wordpress-online-tools/wordpress-tweaks-composer" title="Free WordPress Tweaks Composer Online Tool">WordPress Tweaks Composer</a> tool.</em>
Plugin URI: http://hackadelic.com/solutions/wordpress/tweaks
Author: Hackadelic
Author URI: http://hackadelic.com
*/

if (!is_admin()):

	// ===========================================================================
	// Shortcodes in sidebar (text) widgets
	//
	add_filter('widget_text', 'do_shortcode', 11);

else: //-----------------------------------------------------------------------------------

	// ===========================================================================
	// Use CodePress syntax-coloring editor in the dashboard
	//
	add_action('admin_init', 'hackadelic_useCodepress');

	function hackadelic_useCodepress() {
		if ( use_codepress() ) wp_enqueue_script( 'codepress' );
	}

	// ===========================================================================
	// Include a convenience link to the Tweaks Composer in the plugin dashboard
	//
	add_filter('plugin_row_meta', 'hackadelic_tweaks_addConvenienceLinks', 10, 2);

	function hackadelic_tweaks_addConvenienceLinks($links, $file) {
		if ($file == plugin_basename(__FILE__))
			$links[] = '<a target="_blank" href="http://hackadelic.com/wordpress-online-tools/wordpress-tweaks-composer">Create Customized Personal Edition</a>';
		return $links;
	}

endif;

?>