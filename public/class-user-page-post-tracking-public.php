<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://clariontech.com
 * @since      1.0.0
 *
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/public
 * @author     Yogesh Dalavi <y.dalavi77@gmail.com>
 */
class User_Page_Post_Tracking_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Get the current Page / post id and store it into the database.	
	 *
	 * @since    1.0.0
	 */
	public function get_post_page_id(){
		/**
		 * This function used to get current the page and post id and store id into the database.
		 */
		if ( is_user_logged_in() ) {
			global $wpdb;
			$id = get_the_ID();
			$post_type = get_post_type($id);
			$user_id = get_current_user_id();
			$current_timestamp = date('Y-m-d H:i:s');
			
			$ip_address = $_SERVER['REMOTE_ADDR'];  
			// Insert the page or post id to the database and update the time.
			
			$table_name = $wpdb->prefix.'user_page_post_tracking';
			
			$visited_page_post_id = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE `user_id` = %d and `page_post_id= %d`", $user_id, $id) );
			
			if($visited_page_post_id){
				// Update the current visitited time of the current page.
				$wpdb->query($wpdb->prepare("UPDATE $table_name SET time = '$current_timestamp' WHERE `user_id`= $user_id AND `page_post_id`= $id"));
			
			}else{
				
				$wpdb->insert( 
					$table_name, 
					array( 
						'user_id' => $user_id, 
						'time' => $current_timestamp, 
						'page_post_id' => $id,
						'post_type' => $post_type,
						'ip_address' => $ip_address
					), 
					array( '%d','%s','%d', '%s','%s')
				);

			}
			
		}
	
	}
	
}
