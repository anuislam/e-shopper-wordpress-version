<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
    function eshop_after_setup_theme(){
        
        
    	//**********************************
    	// woocommerce support
    	//**********************************
        
        add_theme_support( 'woocommerce' );
        
        
    	//**********************************
    	// single page rewrite_rules false
    	//**********************************
        
        flush_rewrite_rules(false);
        
        
    	//**********************************
    	// Title tag
    	//**********************************
    	
    	add_theme_support( 'title-tag' );
    	add_theme_support( 'automatic-feed-links' );
    
    	//**********************************
    	// Thumbnails
    	//**********************************
    
    	add_theme_support( 'post-thumbnails' );
    	add_image_size( 'slider_image', 484, 441, true );
    	add_image_size( 'price_image', 172, 172, true );
    	add_image_size( 'eshop_product_image', 268, 249, true );
    	add_image_size( 'eshop_tab_image', 208, 183, true );
    	add_image_size( 'eshop_reco_image', 268, 134, true );
    	add_image_size( 'eshop_shop_single_image', 266, 381, true );
    	add_image_size( 'eshop_shop_single_slider', 84, 84, true );
    	add_image_size( 'eshop_cart_image', 110, 110, true );
        add_image_size( 'eshop_logo_image', 140, 40, true );
        add_image_size( 'eshop_blog_image', 862, 398, true );
        add_image_size( 'eshop_sidebar_image', 270, 329, true );
        add_image_size( 'eshop_footer_image', 121, 57, true );
        add_image_size( 'eshop_footer_map_image', 295, 154, true );
    	add_image_size( 'eshop_404_image', 836, 748, true );
    
    	//**********************************
    	// html5
    	//**********************************
    	add_theme_support( 'html5', array(
    		'search-form',
    		'comment-form',
    		'comment-list',
    		'gallery',
    		'caption',
    	) );

		//**********************************
		// register_nav_menus
		//**********************************
		
		register_nav_menus( array(
			'main_menu' => 'Main menu',
			'top_menu'  => 'Top menu'
		) );
  
		//**********************************
		// register slider popst type
		//**********************************
	    $sliderargs = array(
	      'public' => true,
	      'label'  => 'Sliders',
	      'supports'           => array( 'title', 'thumbnail' )
	    );
	    register_post_type( 'slider', $sliderargs );



/*************************************
*eshop brand BRANDS
*************************************/


	
	$brand_labels = array(
		'name'                       => __( 'Brand', 'eshop' ),
		'singular_name'              => __( 'Brand', 'eshop' ),
		'menu_name'                  => __( 'Brand', 'eshop' ),
		'all_items'                  => __( 'All Brands', 'eshop' ),
		'parent_item'                => __( 'Parent Brands', 'eshop' ),
		'parent_item_colon'          => __( 'Parent Brands:', 'eshop' ),
		'new_item_name'              => __( 'New City Brand', 'eshop' ),
		'add_new_item'               => __( 'Add New Brand', 'eshop' ),
		'edit_item'                  => __( 'Edit Brand', 'eshop' ),
		'update_item'                => __( 'Update Brand', 'eshop' ),
		'view_item'                  => __( 'View Brand', 'eshop' ),
		'separate_items_with_commas' => __( 'Separate Brand with commas', 'eshop' ),
		'add_or_remove_items'        => __( 'Add or remove Brand', 'eshop' ),
		'choose_from_most_used'      => __( 'Choose from the most used Work Brand', 'eshop' ),
		'popular_items'              => __( 'Popular Brand', 'eshop' ),
		'search_items'               => __( 'Search Brand', 'eshop' ),
		'not_found'                  => __( 'Filter Not Brand', 'eshop' ),
		'no_terms'                   => __( 'No Brand', 'eshop' ),
		'items_list'                 => __( 'Brand list', 'eshop' ),
		'items_list_navigation'      => __( 'Brand list navigation', 'eshop' ),
	);
	$brand_args = array(
		'labels'                     => $brand_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true
	);
	register_taxonomy( 'brand', array('product'), $brand_args );

    }

add_action( 'after_setup_theme', 'eshop_after_setup_theme' );



function eshop_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Header Widget', 'eshop' ),
        'id' => 'header_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );

    register_sidebar( array(
        'name' => __( 'Sidebar Widget', 'eshop' ),
        'id' => 'sidebar_widget',
        'before_widget' => '<div class="brands_products" style="margin:30px 0;">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'footer_link', 'eshop' ),
        'id' => 'footer_link_widget',
        'before_widget' => '<div class="col-sm-2"><div class="single-widget">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'footer_mail', 'eshop' ),
        'id' => 'footer_mail_widget',
        'before_widget' => '<div class="col-sm-3 col-sm-offset-1"><div class="single-widget" id="eshop_mail_form">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'eshop_widgets_init' );





add_filter( 'wp_nav_menu_items', 'esho_add_in_login_menu', 10, 2 );

function esho_add_in_login_menu( $items, $args )
{
    

if (! is_user_logged_in() ) {
    if ($args->menu == 'top_menu') {
        $items .= '<li><a href="'.eshop_site_url.'/my-account/"><i class="fa fa-lock"></i> Login</a></li>';
    }
} 


    return $items;
}


function esho_rating_format( $data )
{
    
    $data = explode(".", $data);
    if(is_array($data)){
    	return $data[0];
    }else{
   	 	return $data;
    }
    
}




