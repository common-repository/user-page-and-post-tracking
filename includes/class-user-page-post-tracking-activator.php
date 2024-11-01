<?php

/**
 * Fired during plugin activation
 *
 * @link       https://clariontech.com
 * @since      1.0.0
 *
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/includes
 * @author     Yogesh Dalavi <y.dalavi77@gmail.com>
 */
class User_Page_Post_Tracking_Activator {

	/**
	 * Create Table for user tracking activity 
	 *
	 * This function used to create the table intot he database which can store the user's visited
	 * post and pages id.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;
		
		$table_name = $wpdb->prefix . 'user_page_post_tracking';
		
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			user_id INT NOT NULL,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			page_post_id int(20) unsigned NOT NULL,
			post_type varchar(20) NOT NULL,
			ip_address varchar(50) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		
	}

}
