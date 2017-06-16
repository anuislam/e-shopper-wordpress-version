<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php $prifix = 'eshop_'; ?>
<?php $_single_page_title = cs_get_option( $prifix.'_single_page_title' ); ?>
<?php global $wp_query; ?>
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
					<div class="blog-post-area"><!--blog-post-area-->
						<h2 class="title text-center"><?php echo $_single_page_title; ?></h2>

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
							<?php the_content(); ?>
							<div class="pager-area">
								<ul class="pager pull-right">
									<?php $pre_post = get_previous_post(); ?>
									<?php $next_post = get_next_post(); ?>

									<?php $pre_link = @esc_url(get_the_permalink($pre_post->ID)); ?>

									<?php $next_link = @esc_url(get_the_permalink($next_post->ID)); ?>

									<?php if (!empty($pre_post)) {
										echo '<li><a href="'.$pre_link.'">Pre</a></li>';
									} ?>
									
									<?php 
										if (!empty($next_post)) {										
											echo '<li><a href="'.$next_link.'">Next</a></li>';
										} 
									?>

								</ul>
							</div>
						</div>

					</div><!--blog-post-area-->	
					<div class="rating-area">
						<?php $post_tag = get_the_terms( get_the_ID(), 'post_tag' ); ?>
						<ul class="tag">							
							<?php

							if (!empty($post_tag)) {
								if (is_array($post_tag)) {
									$a1 = 0;
									$slash = '';
									echo '<li>TAG:</li>';
									foreach ($post_tag as $tag) {
										$tag_link = get_term_link( $tag->term_id, 'post_tag' );
										if ($a1 != 0) {
											$slash = '<span>/</span>';
										}
										?>
										<li><a class="color" href="<?php echo $tag_link; ?>"><?php echo $slash; ?> <?php echo $tag->name; ?></a></li>
										<?php
										$a1++;
									}
								}
							}

							?>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share" id="eshop_social_share">
					</div><!--/socials-share-->


					<div class="media commnets">
						<?php $author_url = get_author_posts_url( get_the_author_meta('ID') ); ?>
						<a class="pull-left" href="<?php echo $author_url; ?>">
							<?php echo get_avatar( get_the_author_meta('ID'), '136' ); ?>
						</a>
						<div class="media-body">

							<h4 class="media-heading"><?php echo get_the_author_meta( 'display_name' ,get_the_author_meta('ID') ); ?></h4>
							<p><?php echo get_the_author_meta( 'description' , get_the_author_meta('ID') ); ?></p>
							<div class="blog-socials">
								<ul id="user_blog_social">
									<li><a href="<?php echo get_the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo get_the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo get_the_author_meta('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="<?php echo get_the_author_meta('google'); ?>"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="<?php echo get_the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="<?php echo $author_url; ?>">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->

<?php 
 if ( comments_open() || get_comments_number() ) :
     comments_template('/comments.php');
 endif;

 ?> 
 <?php

$comm_args = array(
	'comment_field' => '
			<div class="col-sm-8 pull-right" id="eshop_check_div">
				<div class="text-area" style="margin:0;">
					<div class="blank-arrow">
						<label>Your Comment</label>
					</div>
					<span>*</span>
					<textarea name="comment" rows="11" placeholder="Your Comment..."></textarea>
				</div>
			</div>',
  'fields' => apply_filters( 'comment_form_default_fields', array(
	    'author' =>
	      '<div class="col-sm-4 pull-left">
	      	<div class="blank-arrow">
				<label>Your Name</label>
			</div>
			<span>*</span>
		  <input type="text" placeholder="write your name..." name="author">',

	    'email' =>
	      	'<div class="blank-arrow">
				<label>Email Address</label>
			</div>
			<span>*</span>
			<input type="email" name="email" placeholder="your email address...">',

	    'url' =>
	      '	<div class="blank-arrow">
				<label>Web Site</label>
			</div>
			<input type="url" name="url" placeholder="Web Site...">
	      	</div>'
	    )

	)
);



?>
					<div class="replay-box">
						<div class="row">
<?php   comment_form($comm_args); ?>
						</div>
					</div><!--/Repaly Box-->

				</div>
			</div>
		</div>
	</section>

	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
