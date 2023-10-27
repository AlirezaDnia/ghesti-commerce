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





function ghc_admin_menu_page()
{
  include 'admin/ghc-options.php';
}
function ghc_admin_menu_page2()
{
  include 'admin/sample.php';
}


function ghc_menu_page()
{
  add_menu_page(
    ' قسطی کامرس',
    ' قسطی کامرس',
    'manage_options',
    'ghc-setting',
    'ghc_admin_menu_page',
    '',
    6
  );
  add_submenu_page(
    'ghc-setting',
    'لایسنس فعال سازی',
    'لایسنس فعال سازی',
    'manage_options',
    'ghc-license',
    'ghc_admin_menu_page2'
  );
}
add_action('admin_menu', 'ghc_menu_page');


/**
 * For plugin 'Ghesti Commerce'.
 * Return Installment Price.
 * @param int $price A original price.
 * @return int Calculated price.
 */
function ghc_get_price($price)
{
  global $gheimat;
  $gheimat = $price;
  return $price;
}
add_action('woocommerce_get_price', 'ghc_get_price');

/**
 * For plugin 'Ghesti Commerce'.
 * Custom and Store setting about Installment.
 * @return void.
 */
function ghc_ghest()
{
  global $gheimat;
  global $wpdb, $table_prefix;
  $tb_name = $table_prefix . 'ghc_info';

  $q = "SELECT * FROM `$tb_name`";
  $results = $wpdb->get_results($q);

  $pgh = ($gheimat * $results[0]->prepay / 100);
  $fgh = $gheimat - $pgh;

  ob_start();
?>

  <div class="ghc-table">
    <table>
      <tr>
        <th>
          <div> خرید اقساطی <span>(در <?php echo $results[0]->count  ?> قسط)</span></div>
          <div><a href="<?php echo $results[0]->link ?>">اطلاعات بیشتر ></a></div>
        </th>
      </tr>
      <tr>
        <td>
          <div>
            <span>پیش پرداخت: </span>
            <span class="woocommerce-Price-amount amount"><?php echo number_format($pgh);
                                  echo '&nbsp;' . $results[0]->currency; ?></span> </div>
        </td>
      </tr>
      <tr>
        <td>
          <div><span> ماهانه مبلغ:</span>
            <span class="woocommerce-Price-amount amount"><?php echo number_format($fgh / $results[0]->count);
                                  echo '&nbsp;' . $results[0]->currency; ?></span> </div>
        </td>
      </tr>
    </table>
  </div>
<?php
  $html = ob_get_clean();

  echo $html;
  return;
}
add_action('woocommerce_after_add_to_cart_button', 'ghc_ghest');





// function PriceInstallment()
// {

//     function ghc_get_price($price)
//     {
//         global $gheimat;
//         $gheimat = $price;
//         return $price;
//     }
//     add_action('woocommerce_get_price', 'ghc_get_price');

//     function ghc_ghest()
//     {
//         global $gheimat;
//         echo "
//         <div>
        
//         </div>
//         ";
//         echo number_format($gheimat / 4) . ' ' . 'تومان برای هر قسط';
//         return;
//     }
//     add_action('woocommerce_after_add_to_cart_button', 'ghc_ghest');
// }
// add_action('init', 'PriceInstallment');