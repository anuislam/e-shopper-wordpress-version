<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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

global $product;
$prefix = 'eshop_';

$bterms = wp_get_post_terms( $product->get_id(), 'brand');
$cterms = wp_get_post_terms( $product->get_id(), 'product_cat');

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>


<?php
if ( $product->is_in_stock() ) {
    echo '<p><b>Availability:</b> In stock </p>';
} else {
	echo '<p><b>Availability:</b> Out of stock </p>';
}

?>

<p><b>Condition:</b> <?php echo get_post_meta($product->get_id(), $prefix.'prod_condition', true ) ?></p>
<p><b>Brand:</b> <?php
$a1 = 0;
if (empty($bterms) === false) {
	if (is_array($bterms)) {
		foreach ($bterms as $bterm) {
			$comma = ($a1 == 0) ? '' : ', ' ;
			echo '<a href="'.get_term_link( $bterm->term_id, 'brand' ).'" class="link_color">'. $comma . $bterm->name.'</a>';
			$a1++;
		}
	}
}

?></p>
<p><b>Categories:</b> <?php
$b1 = 0;
if (empty($cterms) === false) {
	if (is_array($cterms)) {
		foreach ($cterms as $cterm) {
			$cat_comma = ($b1 == 0) ? '' : ', ' ;
			echo '<a href="'.get_term_link( $cterm->term_id, 'brand' ).'" class="link_color">'. $cat_comma . $cterm->name.'</a>';
			$b1++;
		}
	}
}

?>
</p>


<div id="eshop_social_share"></div>


	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
