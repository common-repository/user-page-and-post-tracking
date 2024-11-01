<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://clariontech.com
 * @since      1.0.0
 *
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/includes
 * @author     Yogesh Dalavi <y.dalavi77@gmail.com>
 */
class User_Page_Post_Tracking_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'user-page-post-tracking',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
