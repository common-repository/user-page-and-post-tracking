<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://clariontech.com
 * @since      1.0.0
 *
 * @package    User_Page_Post_Tracking
 * @subpackage User_Page_Post_Tracking/admin/partials
 */
global $wpdb;
$user_id = get_current_user_id();
$table_name = $wpdb->prefix.'user_page_post_tracking';
$visited_data = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE `user_id` = %d", $user_id) );
$dataArray = array();
foreach ($visited_data as $key => $data ){
    $dataArray[$data->post_type][$key] = $data;
}
?>
<h3 class="heading">User Tracking Page(s) / Post(s)</h3>
<table class="form-table">

<?php foreach($dataArray as $key => $value) {  ?>
    <tr> <th><label style="text-transform: capitalize;"><?php echo $key; ?></label></th>
    <td>
    <?php foreach($value as $posts) {
            echo  '<span style="
            background-color: #c1c1c1c1;
            padding: 5px;
            margin-right: 5px;
            border-radius: 13px;
        ">'.$posts->page_post_id.' - '.get_the_title($posts->page_post_id).'</span>';
    }?>
    </td>
    </tr>
<?php   } ?>
</table>