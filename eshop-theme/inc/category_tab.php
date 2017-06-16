<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php
$option_prifix = 'eshop_';
$full_tab = cs_get_option( $option_prifix.'_home_settings' );

?>

<div class="col-sm-12">
	<ul class="nav nav-tabs">
		
<?php

if(empty($full_tab) === false){
	if(is_array($full_tab)){
		$a1 = 0;
		foreach($full_tab as $tab){
			$tab = (int)$tab['eshop__select_cat'];
			if(is_numeric($tab)){
				$tarm = get_term( $tab );
				if($tarm){
?>

<li class="<?php echo ($a1 == 0) ? 'active' : '' ; ?>"><a href="#eshop_<?php echo @$tarm->slug; ?>" data-toggle="tab"><?php echo @$tarm->name; ?></a></li>

<?php
$a1++;
				}
			}
		}
	}
}


?>		
		
	</ul>

<div class="tab-content">
	
<?php

if(empty($full_tab) === false){
	if(is_array($full_tab)){
		$a1 = 0;
		foreach($full_tab as $tab){
			$tab = (int)$tab['eshop__select_cat'];
			if(is_numeric($tab)){
				$tarm = get_term( $tab );
				if($tarm){
?>

	<div class="tab-pane fade <?php echo ($a1 == 0) ? 'active in' : '' ; ?>" id="eshop_<?php echo @$tarm->slug; ?>" >
		<!--//loop-->
		
		
<?php
$args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'product_cat' => $tarm->slug );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$product = wc_get_product( get_the_ID() );


?>

		<div class="col-sm-3">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<?php the_post_thumbnail('eshop_tab_image', array('alt' => get_the_title())); ?>
						<h2><?php echo eshop_get_currency_symbol($product->get_price()); ?></h2>
						<p><?php echo $product->get_name(); ?></p>
						<a href="<?php echo get_the_permalink(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					
				</div>
			</div>
		</div>

<?php endwhile; 
wp_reset_query();

?>	
	</div>

<?php
$a1++;
				}
			}
		}
	}
}


?>	
	
</div>
</div>