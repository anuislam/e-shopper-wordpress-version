<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							
							
		<?php
		$args = array( 'post_type' => 'slider', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		$prefix = 'eshop_';
		$a1 = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
		$slider_title = get_post_meta(get_the_ID(), $prefix.'slider_title', true);
		$slider_desc = get_post_meta(get_the_ID(), $prefix.'slider_desc', true);
		$slider_text = get_post_meta(get_the_ID(), $prefix.'slider_text', true);
		$slider_url = get_post_meta(get_the_ID(), $prefix.'slider_url', true);
		$price_image_id = get_post_meta(get_the_ID(), $prefix.'image_id', true);
		$price_image = wp_get_attachment_image_src( $price_image_id, 'price_image' );
		?>

							<div class="item <?php echo ($a1 == 0) ? 'active' : '' ; ?>">
								<div class="col-sm-6">
									<h1><span><?php echo @$slider_title['first']; ?></span>-<?php echo @$slider_title['seccend']; ?></h1>
									<h2><?php echo get_the_title(); ?></h2>
									<p<?php echo @$slider_desc; ?></p>
									<a href="<?php echo @$slider_url; ?>" type="button" class="btn btn-default get"><?php echo @$slider_text; ?></a>
								</div>
								<div class="col-sm-6">
									
									<?php the_post_thumbnail('slider_image', array('class' => 'girl img-responsive', 'alt' => get_the_title())); ?>
									
									<img src="<?php echo @$price_image[0]; ?>"  class="pricing" alt="<?php echo get_the_title(); ?>" />
								</div>
							</div>

		<?php
		
		$a1++;
		
		endwhile; ?>		
							
							
						</div>
						
						<a href="<?php echo get_template_directory_uri(); ?>/#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="<?php echo get_template_directory_uri(); ?>/#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->