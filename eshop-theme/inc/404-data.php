<?php $prifix = 'eshop_'; ?>
<?php $logo_upload = cs_get_option( $prifix.'logo_upload' ); ?>
<?php $image = ''; ?>
<?php $image[0] = get_template_directory_uri().'/images/home/logo.png'; ?>
<?php if(!empty($logo_upload)){ ?>
<?php $image = wp_get_attachment_image_src( $logo_upload, 'eshop_logo_image' );?>
<?php } ?>

<?php $_404_title = cs_get_option( $prifix.'_404_title' ); ?>
<?php $_404_description = cs_get_option( $prifix.'_404_description' ); ?>
<?php $_404_button_text = cs_get_option( $prifix.'_404_button_text' ); ?>
<?php $_404_button_url = cs_get_option( $prifix.'_404_button_url' ); ?>
<?php $_404_big_image = cs_get_option( $prifix.'_404_big_image' ); ?>
<?php $big_image = wp_get_attachment_image_src( $_404_big_image, 'eshop_404_image' );?>
<div class="text-center" style="margin-bottom:50px;">
	<div class="logo-404">
		<a href="<?php echo eshop_site_url; ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
	</div>
	<div class="content-404">
		<img src="<?php echo @$big_image[0]; ?>" class="img-responsive" alt="<?php echo get_bloginfo('name'); ?>" />
		<h1><?php echo $_404_title; ?></h1>
		<?php echo wpautop($_404_description); ?>
		<h2><a href="<?php echo $_404_button_url; ?>"><?php echo $_404_button_text; ?></a></h2>
	</div>
</div>