<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
$option_prifix = 'eshop_';
$reco_items = cs_get_option( $option_prifix.'_reco_item' );
$reco_title = cs_get_option( $option_prifix.'_reco_title' );

?>	
						<h2 class="title text-center"><?php echo $reco_title; ?></h2>					
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
<?php

if(empty($reco_items) === false){
	if(is_array($reco_items)){
		$counter = 0;
		foreach($reco_items as $item){
			$item = (int)$item;
			if(is_numeric($item)){
				$get_product = wc_get_product( $item );
				if($get_product){
				$image = wp_get_attachment_image_src( $get_product->get_image_id(), 'eshop_reco_image' );
	if($counter != 0){
		if ($counter % 3 == 0) {
			echo '</div><div class="item">';
		}
	}
				
?>

									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo @$image[0]; ?>" alt="<?php echo $get_product->get_name(); ?>">
													<h2><?php echo eshop_get_currency_symbol($get_product->get_price()); ?></h2>
													<p><?php echo $get_product->get_name();  ?></p>
													<a href="<?php echo get_the_permalink($item); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>

<?php
$counter++;
				}
			}
		}
	}
}

?>									
				
								</div>
							</div>
							 <a class="left recommended-item-control" href="<?php echo get_template_directory_uri(); ?>/#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="<?php echo get_template_directory_uri(); ?>/#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>