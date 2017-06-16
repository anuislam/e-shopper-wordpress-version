<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<?php

/*
Template Name: Home Page
*/

get_header(); 

get_template_part( 'inc/slider' ); ?>
	
	<section>
		<div class="container pd-bottom">
			<div class="row">
				<div class="col-sm-3 pd-bottom">
                    <?php get_sidebar(); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					    <?php get_template_part( 'inc/feature' ); ?>
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
                        <?php get_template_part( 'inc/category_tab' ); ?>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
					    <?php get_template_part( 'inc/recommended_item' ); ?>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer();