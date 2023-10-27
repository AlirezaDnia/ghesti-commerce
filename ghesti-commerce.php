<?php
/*
   Plugin Name: Ghesti Commerce
   description: افزونه محاسبه اقساط برای ووکامرس
   Version: 1.0
   Author: Alireza Davoodinia
   Author URI: https://alirezadev.com
*/

/**
 * Ghesti Commerce Plugin
 * 
 * @package Ghesti Commerce
 * 
 */


if (!defined('ABSPATH')) {
    die('You cannot be hear!');
}


// Basics Functions 

function ghc_plugin_activation()
{
    global $wpdb, $table_prefix;
    $tb_name = $table_prefix . 'ghc_info';

    $q = "CREATE TABLE IF NOT EXISTS `$tb_name` (`id` BIGINT NOT NULL AUTO_INCREMENT , `count` TINYINT NOT NULL , `prepay` TINYINT NOT NULL DEFAULT '0' , `status` TINYINT NOT NULL DEFAULT '1' , `link` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $wpdb->query($q);

    // $data = [
    //     'title' => 'لندو',
    //     'moon' => 4,
    //     'price' => 2000000,
    // ];
    // $wpdb->insert($tb_name, $data);
}
register_activation_hook(__FILE__, 'ghc_plugin_activation');

function ghc_plugin_deactivation()
{
    //
}
register_deactivation_hook(__FILE__, 'ghc_plugin_deactivation');




//requires

require_once 'header.php';
require_once 'functions.php';
