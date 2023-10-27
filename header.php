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


//header
function ghc_head_code()
{

    $output = '<link href="' .  plugins_url() . '/price-installment/style.css" rel="stylesheet">';
    // $output .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

    echo $output;
}
add_action('wp_head', 'ghc_head_code');

function ghc_admin_head_code() {

    $output = '<link href="' .  plugins_url() . '/price-installment/style.css" rel="stylesheet">';
    // $output .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

    echo $output;

}

add_filter('admin_head', 'ghc_admin_head_code');
