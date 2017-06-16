<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php get_header(); ?>

<?php if(have_posts()) : ?>
<?php while(have_posts())  : the_post(); ?>

	<section id="cart_items">
		<div class="container pd-bottom">
			<?php get_template_part( 'inc/breadcrumb' ); ?>
			<div class="table-responsive cart_info">


<?php the_content(); ?>

				
			</div>
		</div>
	</section> <!--/#cart_items-->
   
<?php endwhile; ?>

<?php else : ?>
    <?php get_template_part( 'inc/404-data' ); ?>
<?php endif; ?>

<?php get_footer();