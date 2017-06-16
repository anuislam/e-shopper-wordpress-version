<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>


<div class="view-product <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" style="width:100%;">

<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<img src="'. eshop_root_url . '/images/home/sale.png" class="new" alt="sell">', $post, $product ); ?>

<?php endif;

		
		$attributes = array(
			'title'                   => $image_title,
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
			'id' 					  => 'eshop_shop_single_image',
			'xoriginal' 			  => $full_size_image[0],

		);

		if ( has_post_thumbnail() ) {
?><?php



			$html  = '<div style="position: relative;" class="woocommerce-product-gallery__image" data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '"  ><a href="JavaScript:void(0)">
						'.get_the_post_thumbnail( $post->ID, 'eshop_shop_single_image', $attributes ).'<h3>ZOOM</h3></a>
						
					</div>';


		} else {


			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

		
		?>

</div>

<?php
$attachment_ids = $product->get_gallery_image_ids();
if (empty($attachment_ids) === false) {
	?>

<div id="similar-product" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
	<?php
	do_action( 'woocommerce_product_thumbnails' );

?>

	</div>

    <!-- Controls -->
    <a style="left:0;" class="left item-control" href="#similar-product" data-slide="prev">
    <i class="fa fa-angle-left"></i>
    </a>
    <a style="right:0;" class="right item-control" href="#similar-product" data-slide="next">
    <i class="fa fa-angle-right"></i>
    </a>	
</div>

<?php

}

?>

