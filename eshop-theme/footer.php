<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php $prifix = 'eshop_'; ?>
<?php $_footer_about_title 	= cs_get_option( $prifix.'_footer_about_title' ); ?>
<?php $_footer_about_description = cs_get_option( $prifix.'_footer_about_description' ); ?>
<?php $_footer_video 		= cs_get_option( $prifix.'_footer_video' ); ?>
<?php $_footer_map_image 	= cs_get_option( $prifix.'_footer_map_image' ); ?>
<?php $_footer_map_text 	= cs_get_option( $prifix.'_footer_map_text' ); ?>
<?php $footer_image 		= wp_get_attachment_image_src( $_footer_about_title, 'eshop_logo_image' ); ?>
<?php $_footer_map_image 	= wp_get_attachment_image_src( $_footer_map_image, 'eshop_footer_map_image' ); ?>


	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<div class="eshop_footer_image">
								<img src="<?php echo $footer_image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
							</div>
							<p><?php echo $_footer_about_description; ?></p>
						</div>
					</div>
					<div class="col-sm-7">


<?php 

if (!empty($_footer_video)) {
	if (is_array($_footer_video)) {
		foreach ($_footer_video as $video) {
?>
<?php $eshop_footer_image = wp_get_attachment_image_src( $video[$prifix.'_video_poster'], 'eshop_footer_image' ); ?>
		<div class="col-sm-3">
			<div class="video-gallery text-center">
				<a href="//www.youtube.com/embed/<?php echo $video[$prifix.'_video_url']; ?>" id="eshop_100_footer" data-title="<?php echo $video[$prifix.'_video_title']; ?>">
					<div class="iframe-img">
						<img src="<?php echo $eshop_footer_image[0]; ?>" alt="<?php echo $video[$prifix.'_video_title']; ?>" />
					</div>
					<div class="overlay-icon">
						<i class="fa fa-play-circle-o"></i>
					</div>
				</a>
				<p><?php echo $video[$prifix.'_video_title']; ?></p>
				<h2><?php echo $video[$prifix.'_time_and_date']; ?></h2>
			</div>
		</div>
<?php
		}
	}
}

?>

					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php echo $_footer_map_image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>" />
							<p><?php echo $_footer_map_text; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('footer_link'); ?>
					<?php dynamic_sidebar('footer_mail_widget'); ?>

					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
<!-- modal -->

<div id="eshop_video_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">....</h4>
      </div>
      <div class="modal-body">
		.....
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


    <?php wp_footer(); ?>
</body>
</html>