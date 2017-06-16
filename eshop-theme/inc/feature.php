<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
$prifix = 'eshop_'; ?>
<?php $tab_title = cs_get_option( $prifix.'_tab_title' ); ?>
						<h2 class="title text-center"><?php echo $tab_title; ?></h2>
						
<?php
$prefix = 'eshop_';
$meta_query  = WC()->query->get_meta_query();
$tax_query   = WC()->query->get_tax_query();
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN',
);
$prodargs = array(
		    'post_type'           => 'product',
		    'post_status'         => 'publish',
		    'ignore_sticky_posts' => 1,
		    'posts_per_page'      => 6 ,
		    'meta_query'          => $meta_query,
		    'tax_query'           => $tax_query,
		);
$featured_query = new WP_Query( $prodargs );

if ($featured_query->have_posts()) : 
$counter = 0;
echo '<div class="row">';
    while ( $featured_query->have_posts() ) : $featured_query->the_post();
	if($counter != 0){
		if ($counter % 3 == 0) {
			echo '</div><div class="row">';
		}
	}

?>
<?php get_template_part( 'inc/eshop_loop' ); ?>

<?php
$counter++;
    endwhile;
echo '</div>';
endif;
wp_reset_query();
						
	