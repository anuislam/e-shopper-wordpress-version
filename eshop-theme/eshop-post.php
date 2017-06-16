<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<?php
/*
Template Name: Post Page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>	

	<section>
		<div class="container pd-bottom">
			<?php get_template_part( 'inc/breadcrumb' ); ?>
			<div class="row">
				<div class="col-sm-3 pd-bottom">
                    <?php get_sidebar(); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="blog-post-area"><!--features_items-->
						<h2 class="title text-center"><?php echo get_the_title(); ?></h2>
						<?PHP $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
						<?php $args = array( 
							'post_type' => 'post',
							'paged' => $paged
						 ); ?>
						<?php $loop = new WP_Query( $args ); ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post();?>

						    <?php get_template_part( 'inc/eshop_post_loop' ); ?>

						<?php endwhile; ?>

						<div class="eshop_before_pagination">
							<ul class="pagination">
							<?php esop_paginate_links($loop); ?>
							</ul>
						</div>
					</div><!--features_items-->			
				</div>
			</div>
		</div>
	</section>

	<?php endwhile; ?>
<?php else: ?>
	<?php get_template_part( 'inc/404-data' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
