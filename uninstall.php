<?php

/**
 * Ghesti Commerce Plugin
 * 
 * @package Ghesti Commerce
 * 
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}


// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb, $table_prefix;
$tb_name = $table_prefix . 'ghc_info';

$q = "DROP TABLE `$tb_name`;";
$wpdb->query($q);


// $option_name = 'wporg_option';

// delete_option($option_name);

// // for site options in Multisite
// delete_site_option($option_name);

// // drop a custom database table
// global $wpdb;
// $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");
