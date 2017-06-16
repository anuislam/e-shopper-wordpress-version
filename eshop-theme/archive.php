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
					<div class="blog-post-area"><!--features_items-->
		<?php
			the_archive_title( '<h2 class="title text-center">', '</h2>' );
		?>


		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>

<?php get_template_part( 'inc/eshop_post_loop' ); ?>

<?php
			endwhile; // End of the loop.


		else : ?>

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
