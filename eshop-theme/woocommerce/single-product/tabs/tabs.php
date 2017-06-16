<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$a1 = 0;
$a2 = 0;
if ( ! empty( $tabs ) ) : ?>

				<div class="clearfix"></div>
					<div class="category-tab shop-details-tab"><!--category-tab-->
					  <div class="col-sm-12">
					    <ul class="nav nav-tabs">
							<?php foreach ( $tabs as $key => $tab ) : ?>
								<li class="<?php echo ($key == 'reviews') ? 'active' : '' ; ?>" ><a href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a></li>
							<?php $a1++; ?>
							<?php endforeach; ?>
					    </ul>
					  </div>
					  <div class="tab-content">

						<?php foreach ( $tabs as $key => $tab ) : ?>
						    <div class="tab-pane fade <?php echo ($key == 'reviews') ? 'active in' : '' ; ?>" id="tab-<?php echo esc_attr( $key ); ?>" >
						    	<?php call_user_func( $tab['callback'], $key, $tab ); ?>
						 	</div>
						<?php $a2++; ?>
						<?php endforeach; ?>

					 </div>
					 </div>

<?php endif; ?>
