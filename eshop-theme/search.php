<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<?php get_header(); ?>

	
	<section>
		<div class="container pd-bottom">
			<?php get_template_part( 'inc/breadcrumb' ); ?>
			<div class="row">
				<div class="col-sm-3 pd-bottom">
                    <?php get_sidebar(); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->

		<?php if ( have_posts() ) : ?>
			
			<h2 class="title text-center"><?php printf( __( 'Search Results for: %s', 'eshop' ), get_search_query() ); ?></h2>
		<?php else : ?>
			<h2 class="title text-center"><?php _e( 'Nothing Found', 'eshop' ); ?></h2>
		<?php endif; ?>

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
		$counter = 0;
		echo '<div class="row">';
			while ( have_posts() ) : the_post();

	if($counter != 0){
		if ($counter % 3 == 0) {
			echo '</div><div class="row">';
		}
	}
			 ?>

<?php get_template_part( 'inc/eshop_loop' ); ?>

<?php
$counter++;

			endwhile; // End of the loop.
echo '</div>';

		else : ?>
		
<?php get_template_part( 'inc/404-data' ); ?>

			<?php

		endif;
		?>
						

<div class="eshop_before_pagination">
	<ul class="pagination">
	<?php esop_paginate_links(); ?>
	</ul>
</div>


					</div><!--features_items-->			
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
