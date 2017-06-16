<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php 

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display', 15);
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);

add_filter('yith_woocompare_remove_compare_link_by_cat', function(){
	return true;
});

