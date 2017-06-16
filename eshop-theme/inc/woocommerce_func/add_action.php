<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.

add_action('woocommerce_single_product_summary', function(){
    global $product;


if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : 

    $sku = $product->get_sku();
    if(empty($sku) === false){
        ?>
        
        <p>SKU ID: <?php echo $sku; ?></p>
        
        <?php

    }


endif;

}, 6);

add_action('eshop_shop_loop', function($get_product){
	$get_product = wc_get_product( $get_product->get_id() );
	$image = wp_get_attachment_image_src( $get_product->get_image_id(), 'eshop_reco_image' );


?>

	<div class="single-products">
		<div class="productinfo text-center">
			<img src="<?php echo @$image[0]; ?>" alt="<?php echo $get_product->get_name(); ?>" />
			<h2><?php echo eshop_get_currency_symbol($get_product->get_price()); ?></h2>
			<p><?php echo $get_product->get_name();  ?></p>
			<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

		</div>
		<div class="product-overlay">
			<div class="overlay-content">
				<h2><?php echo eshop_get_currency_symbol($get_product->get_price()); ?></h2>
				<p><?php echo $get_product->get_name();  ?></p>
				<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</div>
		</div>
	</div>
	

<?php do_action('eshop_shop_loop_wishlist_or_compare'); ?>


<?php
});


// Add link or button in the products list or

		add_action( 'woocommerce_single_product_summary', function(){
			global $product;
			?>

<div class="choose single_choose">
	<ul class="nav nav-pills nav-justified">
<li>
<?php do_action('eshop_add_to_wishlist'); ?>
</li>

<?php
if ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ){
?>
		<li><a href="<?php echo eshop_site_url; ?>?action=yith-woocompare-add-product&amp;id=<?php echo $product->get_id(); ?>" class="compare eshop_compare_return" data-product_id="<?php echo $product->get_id(); ?>" rel="nofollow"><i class="fa fa-plus-square"></i><?php echo get_option('yith_woocompare_button_text'); ?></a></li>

<?php 	} ?>
	</ul>
</div>

			<?php
		}, 35 );


	add_action( 'eshop_shop_loop_wishlist_or_compare', function(){
		global $product;
?>

	<div class="choose">
		<ul class="nav nav-pills nav-justified">



<li>
<?php do_action('eshop_add_to_wishlist'); ?>
</li>

<?php if ( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ) { ?>	
			<li><a href="<?php echo eshop_site_url; ?>?action=yith-woocompare-add-product&amp;id=<?php echo $product->get_id(); ?>" class="compare eshop_compare_return" data-product_id="<?php echo $product->get_id(); ?>" rel="nofollow"><i class="fa fa-plus-square"></i><?php echo get_option('yith_woocompare_button_text'); ?></a></li>
<?php }; ?>

		</ul>
	</div>

<?php
		});







add_action( 'eshop_add_to_wishlist', 'eshop_add_to_wishlist_func', 36 );
function eshop_add_to_wishlist_func(){
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');

}