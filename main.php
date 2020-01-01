<?php
 /**
 * Plugin Name: Cuisine
 * Description: Provide List OF Cuisine for creting new vendors list.
 * Author: SP
 * Version: 1.0
 */

if(!defined("ABSPATH")){
    exit;
}
if(!defined("CS_PATH")){
    define("CS_DIR_PATH",plugin_dir_path(__FILE__));
}
if(!defined("CS_PATH_URI")){
    define("CS_PATH_URI",plugin_dir_url(__FILE__));
}
register_activation_hook(__FILE__,'activate_cs_plugin_function');
register_deactivation_hook(__FILE__,'deactivate_cs_function');

function activate_cs_plugin_function(){
    global $wpdb;
    $charset_collate =  $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix."cslist";
    $sql = "CREATE TABLE `$table_name` (
        `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(225),
        `description` text,
        `image_url` varchar(254),
        `status` varchar(224) NOT NULL,
        PRIMARY KEY(id) 
    )$charset_collate;";
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
function deactivate_cs_function(){

}



add_action("admin_menu","create_cs_menu");
function create_cs_menu(){
    add_menu_page('CUISINES','CUISINE','manage_options','view_cuisine_lists','view_all_cuisines','dashicons-carrot',24);
    add_submenu_page('view_cuisine_lists','Cuisine Application','VIEW ALL CUISINE ','manage_options','view_cuisine_lists','view_all_cuisines');
    add_submenu_page('view_cuisine_lists','Cuisine Application','ADD NEW CUISINE','manage_options','add-new-cuisine','add_new_cuisines');
}

function view_all_cuisines(){
    include_once CS_PATH_URI.'\view\view_new.php';
}
function add_new_cuisines(){
    include_once CS_PATH_URI.'\view\add_new.php';
}

?>