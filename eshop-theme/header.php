<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.

$prifix = 'eshop_';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>  itemscope itemtype="http://schema.org/Product">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
    
    <?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class(); ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
<?php $mobile = cs_get_option( $prifix.'mobile' ); ?>
<?php $email = cs_get_option( $prifix.'email' ); ?>

								<li><a href="tel:<?php echo sanitize_text_field($mobile); ?>"><i class="fa fa-phone"></i><?php echo $mobile; ?></a></li>
								<li><a href="mailto:<?php echo sanitize_email($email); ?>"><i class="fa fa-envelope"></i> <?php echo $email; ?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav header_social">
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
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
<?php $logo_upload = cs_get_option( $prifix.'logo_upload' ); ?>
<?php $image = ''; ?>
<?php $image[0] = get_template_directory_uri().'/images/home/logo.png'; ?>
<?php if(!empty($logo_upload)){ ?>
<?php $image = wp_get_attachment_image_src( $logo_upload, 'eshop_logo_image' );?>
<?php } ?>
							<a href="<?php echo eshop_site_url; ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
						</div>
						<div class="btn-group text-center" style="margin-left: 10px;">
							
							<div class="btn-group">

							<?php dynamic_sidebar('header_widget'); ?>
								
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<?php get_template_part( 'inc/topmenu' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<?php get_template_part( 'inc/mainmenu' ); ?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="<?php echo eshop_site_url; ?>/">
								<input type="text" placeholder="Search" name="s" value="<?php echo (!empty($_GET['s'])) ? $_GET['s'] : '' ; ?>"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->