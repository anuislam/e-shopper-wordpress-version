<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.

function eshop_call_all_scripts_files(){
    global $wp_scripts;

$prifix = 'eshop_';
$_scroll_to_top = cs_get_option( $prifix.'_scroll_to_top' );
$_gmap_api = cs_get_option( $prifix.'_gmap_api' );
$_gmap_location_one = cs_get_option( $prifix.'_gmap_location_one' );
$_gmap_location_two = cs_get_option( $prifix.'_gmap_location_two' );
$_gmap_color = cs_get_option( $prifix.'_gmap_color' );
$_gmap_zoomm = cs_get_option( $prifix.'_gmap_zoomm' );
$_gmap_scrollwhee = cs_get_option( $prifix.'_gmap_scrollwhee' );
$_gmap_lightnes = cs_get_option( $prifix.'_gmap_lightnes' );

	wp_register_script( 
		'html5shivone', 
		'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', 
		array(), 
		'1.0'
	);
	wp_register_script( 
		'respond', 
		'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', 
		array(), 
		'1.0'
	);

    if ( is_singular() ){
        wp_enqueue_script( 'comment-reply' );
    }




	$wp_scripts->add_data( 'html5shivone', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script('html5shivone');
	wp_enqueue_script('respond');
    
    wp_enqueue_style( 'eshop-style', get_stylesheet_uri() );
    wp_enqueue_style( 'eshop-bootstrap', eshop_root_url.'/css/bootstrap.min.css' );
    wp_enqueue_style( 'eshop-font-awesome', eshop_root_url.'/css/font-awesome.min.css' );
    wp_enqueue_style( 'eshop-prettyPhoto', eshop_root_url.'/css/prettyPhoto.css' );
    wp_enqueue_style( 'eshop-price-range', eshop_root_url.'/css/price-range.css' );
    wp_enqueue_style( 'eshop-animate', eshop_root_url.'/css/animate.css' );
    wp_enqueue_style( 'eshop-jssocials', eshop_root_url.'/css/jssocials.css' );
    wp_enqueue_style( 'eshop-jssocials-theme', eshop_root_url.'/css/jssocials-theme-flat.css' );
    
if (is_singular( 'product' )) {
    wp_enqueue_style( 'eshop-xzoom-css', eshop_root_url.'/css/xzoom.css' );
    wp_enqueue_style( 'magnific-popup', eshop_root_url.'/css/magnific-popup.css' );
}       

    wp_enqueue_style( 'eshop-main', eshop_root_url.'/css/main.css' );
    wp_enqueue_style( 'eshop-responsive', eshop_root_url.'/css/responsive.css' );
    
    
    
    wp_register_script( 'bootstrap-js', eshop_root_url.'/js/bootstrap.min.js', 'jquery', 1.0, true );
    wp_register_script( 'scrollUp-js', eshop_root_url.'/js/jquery.scrollUp.min.js', 'jquery', 1.0, true );
    wp_register_script( 'price-range-js', eshop_root_url.'/js/price-range.js', 'jquery', 1.0, true );
    wp_register_script( 'prettyPhoto-js', eshop_root_url.'/js/jquery.prettyPhoto.js', 'jquery', 1.0, true );
    wp_register_script( 'jssocials-js', eshop_root_url.'/js/jssocials.min.js', 'jquery', 1.0, true );    
    wp_register_script( 'google-map-js', '//maps.googleapis.com/maps/api/js?key='.$_gmap_api, 'jquery', 1.0, true );
    wp_register_script( 'contact-js', eshop_root_url.'/js/contact.js', 'jquery', 1.0, true );
    wp_register_script( 'xzoom-js', eshop_root_url.'/js/xzoom.js', 'jquery', 1.0, true );
    wp_register_script( 'xzoom-gallery-js', eshop_root_url.'/js/jquery.magnific-popup.min.js', 'jquery', 1.0, true );
    wp_register_script( 'main-js', eshop_root_url.'/js/main.js', 'jquery', 1.0, true );


// Localize the script with new data
$eshop_local = array(
'loged_id_user' => (is_user_logged_in())  ? 'yes' : 'no',
'single_product' => (is_singular( 'product' )) ? 'yes' : 'no' ,
'scroll_to_top' => ($_scroll_to_top)  ? 'yes' : 'no'
);
wp_localize_script( 'main-js', 'eshop_local', $eshop_local );
wp_localize_script( 'contact-js', 'eshop_map', array(
                                                'map_location_first'          => $_gmap_location_one,
                                                'map_location_seccend'          => $_gmap_location_two,
                                                'map_zoom'              => (int)$_gmap_zoomm,
                                                'map_scrollwheel'       => ($_gmap_scrollwhee == 'yes') ? 'yes' : 'no' ,
                                                'map_lightness'         => $_gmap_lightnes,
                                                'map_color'             => $_gmap_color,
                                                'eshop_permalink'       => (is_singular( 'product' )) ? get_the_permalink( get_the_ID() ) : '' ,
                                                'eshop_title'           => (is_singular( 'product' )) ? get_the_title( get_the_ID() ) : '' 
                                                ) );

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('scrollUp-js');
    wp_enqueue_script('price-range-js');
    wp_enqueue_script('prettyPhoto-js');
    wp_enqueue_script('jssocials-js');
    
    $filename = basename( get_page_template() );
    if ($filename == 'contact_us.php') {
        wp_enqueue_script('google-map-js');
        wp_enqueue_script('contact-js');
    }
        
if (is_singular( 'product' )) {
    wp_enqueue_script('xzoom-js');
    wp_enqueue_script('xzoom-gallery-js');
}       

    wp_enqueue_script('main-js');
    
}
add_action( 'wp_enqueue_scripts', 'eshop_call_all_scripts_files' );


function eshop_call_nav_icon(){
    ?>
    <link rel="icon" type="image/png" href="<?php echo eshop_root_url; ?>/images/ico/favicon.PNG"" />
    
    <?php
}
add_action('wp_head', 'eshop_call_nav_icon');


function eshop_admin_scripts(){
    wp_enqueue_style( 'eshop-rangeslider', eshop_root_url.'/css/rangeslider.css' );



    
    wp_register_script( 'range_slider',         eshop_root_url.'/js/rangeslider.min.js', 'jquery', 1.0, true );
    wp_register_script( 'eshop_admin_main_js',  eshop_root_url.'/js/admin_main.js', 'jquery', 1.0, true );
    wp_enqueue_script('range_slider');
    wp_enqueue_script('eshop_admin_main_js');
}
add_action('admin_enqueue_scripts', 'eshop_admin_scripts');