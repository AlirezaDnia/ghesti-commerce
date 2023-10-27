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

global $wpdb, $table_prefix;
$tb_name = $table_prefix . 'ghc_info';

$q = "SELECT * FROM `$tb_name`";
$results = $wpdb->get_results($q);

// echo '<pre>';
// print_r($data);
// echo '</pre>';
if (isset($_POST['submit'])) {

  $inputs = [
    "count" => $_POST['count'],
    "prepay" => $_POST['prepay'],
    "link" => "https://google.com",
  ];

  if (count($results) > 0) {
    $wpdb->update($tb_name, $inputs, ['id' =>  $results[0]->id]);
    echo '
    <div id="message" class="updated notice is-dismissible"><p>تنظیمات ذخیره شد.</p></div>';
  } else {
    $wpdb->insert($tb_name, $inputs);
  }
}

?>

<div class="wrap">
  <h1>تنظیمات بخش قسطی کامرس</h1>
  <div class="wrap">
    <form method="post" action="admin.php?page=ghc-setting">
      <label for="count">تعداد اقساط:</label><br>
      <input type="number" id="fname" name="count" class="small-text"><span>&nbsp; ماه</span><br><br>
      <label for="prepay"> درصد پیش پرداخت:</label><br>
      <input type="number" id="lname" name="prepay" class="small-text"><span>&nbsp; درصد</span><span>&nbsp; (درصورت نداشتن پیش پرداخت صفر بگذارید)</span><p></p><br>
      <input type="submit" name='submit' type="hidden" value="ذخیره" class="button button-primary">
    </form>


    <!-- <h1 class="wp-heading-inline"></h1>
    <p class="p-4">متاسفیم، صفحه مورد نظر یافت نشد.</p>
    <a href="
    <?php 
    // echo get_bloginfo('url'); 
    ?>
    " class="bg-warning rounded p-2 link-light">
      برو به صفحه
    </a> -->

  </div>
</div>