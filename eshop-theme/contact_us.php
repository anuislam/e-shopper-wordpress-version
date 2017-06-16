<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<?php
/*
Template Name: Contact US
*/

get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>
<?php $prifix = 'eshop_'; ?>
<?php $_form_title = cs_get_option( $prifix.'_form_title' ); ?>
<?php $_info_title = cs_get_option( $prifix.'_info_title' ); ?>
<?php $_contact_social_title = cs_get_option( $prifix.'_contact_social_title' ); ?>
<?php $_contact_detaild = cs_get_option( $prifix.'_contact_detaild' ); ?>
<?php $_contact_7_code = cs_get_option( $prifix.'_contact_7_code' ); ?>

	 <div id="contact-page" class="container pd-bottom">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><?php echo get_the_title(); ?></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center"><?php echo $_form_title; ?></h2>
	    					<div id="main-contact-form" class="contact-form row">
	    				<?php echo do_shortcode($_contact_7_code); ?>
							</div>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center"><?php echo $_info_title; ?></h2>
	    				<address>
								<?php echo wpautop($_contact_detaild); ?>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center"><?php echo $_contact_social_title; ?></h2>
							<ul>

<?php $social_addr = cs_get_option( $prifix.'_social_addr' ); 

if (!empty($social_addr)) {
	if (is_array($social_addr)) {
		foreach ($social_addr as $social) {
			?>
<li><a href="<?php echo esc_url($social[$prifix.'_share_url']); ?>"><i class="<?php echo sanitize_text_field($social[$prifix.'_share_icon']); ?>"></i></a></li>
			<?php
		}
	}
}

?>


							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();