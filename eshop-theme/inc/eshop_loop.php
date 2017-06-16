<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<?php $product = wc_get_product( get_the_ID() ); ?>
<?php $prefix = 'eshop_'; ?>

<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
				<div class="productinfo text-center">
					<?php the_post_thumbnail('eshop_product_image', array('alt' => get_the_title())); ?>											
					<h2><?php echo eshop_get_currency_symbol($product->get_price()); ?></h2>
					<p><?php echo $product->get_name(); ?></p>
					<a href="<?php echo get_the_permalink(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2><?php echo eshop_get_currency_symbol($product->get_price()); ?></h2>
						<p><?php echo get_the_title(); ?></p>
						<a href="<?php echo get_the_permalink(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>

			<?php			
			$prod_activity = get_post_meta(get_the_ID(), $prefix . 'prod_activity', true);

			if ( $product->is_on_sale() ) { 
			?>
			  	<img src="<?php echo eshop_root_url; ?>/images/home/sale.png" class="new" alt="" />
			<?php
			}else if ($prod_activity == 'New') {
			?>
			  	<img src="<?php echo eshop_root_url; ?>/images/home/new.png" class="new" alt="" />
			<?php
			}
			?>

		</div>
		<?php do_action('eshop_shop_loop_wishlist_or_compare'); ?>
	</div>
</div>