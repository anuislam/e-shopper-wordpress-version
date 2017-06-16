<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php $prifix = 'eshop_'; ?>
<?php $_cat_title = cs_get_option( $prifix.'_cat_title' ); ?>
<?php $_brand_title = cs_get_option( $prifix.'_brand_title' ); ?>
<?php $add_code = cs_get_option( $prifix.'add_codess' ); ?>
<?php $add_code_image = wp_get_attachment_image_src( $add_code, 'eshop_sidebar_image' ); ?>
					<div class="left-sidebar">
						<h2><?php echo $_cat_title; ?></h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
<?php
$prod_data = '';
$terms = get_terms( 'product_cat', array(
    'hide_empty' => false, 'parent' => 0 
) );
if(empty($terms) === false){
	if(is_array($terms)){
		foreach($terms as $tarm){
$child = get_term_children($tarm->term_id,'product_cat');
$prod_data = '';
if(empty($child) === false){
	foreach ( $child as $chid ) {
		$term = get_term_by( 'id', $chid, 'product_cat' );
		$prod_data[] 	= array(
			'url'	=> get_term_link( $chid, 'product_cat' ),
			'name'	=> $term->name
		);
	}
}


?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a
<?php
if(empty($prod_data) === false){
?>
	data-toggle="collapse" data-parent="#accordian" href="#<?php echo $tarm->slug; ?>"
<?php
}else{
	?>
	href="<?php echo get_term_link( $tarm->term_id, 'product_cat' )  ?>"
	<?php
}

?>
						
						>
							<?php
if(empty($prod_data) === false){
?>
	<span class="badge pull-right"><i class="fa fa-plus"></i></span>
<?php
}			
?>	
							<?php echo $tarm->name; ?>
						</a>
					</h4>
				</div>
<?php

if(empty($prod_data) === false){
	if(is_array($prod_data)){
?>

<div id="<?php echo $tarm->slug; ?>" class="panel-collapse collapse">
	<div class="panel-body">
		<ul>

<?php
		foreach($prod_data as $data){
?>

<li><a href="<?php echo $data['url']; ?>"><?php echo $data['name']; ?></a></li>

<?php
		}
?>
		</ul>
	</div>
</div>
		<?php
	}
}

?>
			</div>
			
			<?php
		}
	}
}
?>
						
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2><?php echo $_brand_title; ?></h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
<?php

$brands = get_terms( 'brand', array(
    'hide_empty' => false 
) );

if(empty($brands) === false)
{
	foreach($brands as $brand){
?>

<li><a href="<?php echo get_term_link( $brand->term_id, 'brand' )  ?>"> <span class="pull-right">(<?php echo eshop_brand_count($brand->term_id) ?>)</span><?php echo $brand->name; ?></a></li>

<?php
	}
}

?>									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="shipping text-center"><!--shipping-->							
							<img src="<?php echo $add_code_image[0]; ?>" alt="<?php echo eshop_site_url; ?>">
						</div><!--/shipping-->
						
						<?php dynamic_sidebar('sidebar_widget'); ?>
					
					</div>