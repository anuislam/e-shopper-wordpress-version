<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<div class="single-blog-post">
	<h3><?php echo get_the_title(); ?></h3>
	<div class="post-meta">
		<ul>
			<li><i class="fa fa-user"></i> <?php echo get_the_author(); ?>  </li>
			<li><i class="fa fa-clock-o"></i><?php the_time('g:i a'); ?></li>
			<li><i class="fa fa-calendar"></i><?php echo get_the_time('M d, Y') ?></li>
		</ul>
	</div>
	<a href="<?php echo esc_url(get_the_permalink()); ?>">
		<?php the_post_thumbnail('eshop_blog_image', array('alt' => get_the_title())); ?>
	</a>
	<p><?php echo excerpt('60'); ?></p>
	<a href="<?php echo esc_url(get_the_permalink()); ?>" class="btn btn-primary" >Read More</a>
</div>