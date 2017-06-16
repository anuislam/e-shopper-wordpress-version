<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Related products</h2>
						
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">		

			<?PHP $counter = 0; ?>
			<div class="item active">
			<?php foreach ( $related_products as $related_product ) : 
					$get_product = $related_product;
					$image = wp_get_attachment_image_src( $get_product->get_image_id(), 'eshop_reco_image' );

					if($counter != 0){
						if ($counter % 3 == 0) {
							echo '</div><div class="item">';
						}
					}
					$counter++;
			?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo @$image[0]; ?>" alt="<?php echo $get_product->get_name(); ?>">
									<h2><?php echo eshop_get_currency_symbol($get_product->get_price()); ?></h2>
									<p><?php echo $get_product->get_name();  ?></p>
									<a href="<?php echo get_the_permalink($get_product->get_id()); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								
							</div>
						</div>
					</div>

			<?php endforeach; ?>

				</div>							
				
			</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>			
		</div>			

	</section>

<?php endif;

wp_reset_postdata();
