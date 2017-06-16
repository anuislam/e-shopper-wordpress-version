<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'theme-options',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => 'E-SHOPPER Theme Option <small>Anu Islam Shohag</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// Home page Options
// ----------------------------------------

$option_prifix = 'eshop_';

$options[]      = array(
  'name'        => 'header_settings',
  'title'       => 'Header Settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(
      array(
        'id'    => $option_prifix.'mobile',
        'type'  => 'text',
        'title' => 'Phone Number',
      ),
      array(
        'id'    => $option_prifix.'email',
        'type'  => 'text',
        'title' => 'Email Address',
      ),
      array(
        'id'              => $option_prifix.'_social_addr',
        'type'            => 'group',
        'title'           => 'Social Share Icon',
        'button_title'    => 'Add New',
        'accordion_title' => 'Add New Icon',
        'fields'          => array(
          
          array(
            'id'             => $option_prifix.'_share_url',
            'type'           => 'text',
            'title'          => 'Paste Social URL'
          ),
          
          array(
            'id'             => $option_prifix.'_share_icon',
            'type'           => 'icon',
            'title'          => 'Select An Icon'
          )
        )
      ),      
      array(
        'id'    => $option_prifix.'logo_upload',
        'type'      => 'image',
        'title' => 'Upload your logo',
      ),
    )
  );

$options[]      = array(
  'name'        => 'home_ettings',
  'title'       => 'Home Settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_tab_title',
          'type'    => 'text',
          'title'   => 'Features Tab Title',
        ),
        array(
          'id'              => $option_prifix.'_home_settings',
          'type'            => 'group',
          'title'           => 'Features Tab Items',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Tab Item',
          'fields'          => array(
            
            array(
              'id'             => $option_prifix.'_select_cat',
              'type'           => 'select',
              'title'          => 'Select With Product Categories',
              'options'        => 'categories',
              'default_option' => 'Select a product Category',
                    'query_args'  => array(
                            'type'      => 'product', // Custom post type
                            'taxonomy'  => 'product_cat', // Custom post type's taxonomy
                            'hide_empty' => false
                    ),
            )

          )
        ),
        array(
          'id'      => $option_prifix.'_reco_title',
          'type'    => 'text',
          'title'   => 'Recommended Items Title',
        ),  
        array(
          'id'                 => $option_prifix.'_reco_item',
          'type'               => 'select',
          'title'              => 'Recommended Items',
          'options'            => 'posts',
          'class'              => 'chosen',
          'query_args'  => array(
                      'post_type' => 'product',  // Your post_type name
                      'orderby'   => 'ID',
                      'order'     => 'DESC',
                      'posts_per_page' => -1,
                    ),
          'attributes'         => array(
            'data-placeholder' => 'Select your Recommended Product',
            'multiple'         => 'only-key',
            'style'            => 'width: 400px;'
          ),
          'info'               => 'Add Recommended Items',
        ),
  )
);

$options[]      = array(
  'name'        => 'sidebar_setting',
  'title'       => 'Sidebar Settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_cat_title',
          'type'    => 'text',
          'title'   => 'Category Title',
        ),  

        array(
          'id'      => $option_prifix.'_brand_title',
          'type'    => 'text',
          'title'   => 'Brands Title',
        ),  
        array(
          'id'    => $option_prifix.'add_codess',
          'type'      => 'image',
          'title' => 'Upload your benner',
        ),

  )
);

$options[]      = array(
  'name'        => 'footer_setting',
  'title'       => 'Footer Settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_footer_about_title',
          'type'    => 'image',
          'title'   => 'Footer About Us Logo',
        ),  

        array(
          'id'      => $option_prifix.'_footer_about_description',
          'type'    => 'textarea',
          'title'   => 'Footer About Us Desctiprion',
        ),
        array(
          'id'              => $option_prifix.'_footer_video',
          'type'            => 'group',
          'title'           => 'Add Testimonial Video',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Video',
          'fields'          => array(
            
            array(
              'id'             => $option_prifix.'_video_poster',
              'type'           => 'image',
              'title'          => 'Add Video poster'
            ),
            
            array(
              'id'             => $option_prifix.'_video_url',
              'type'           => 'text',
              'title'          => 'Your YouTube Video ID'
            ),
            
            array(
              'id'             => $option_prifix.'_video_title',
              'type'           => 'text',
              'title'          => 'Paste Video Title'
            ),
            
            array(
              'id'             => $option_prifix.'_time_and_date',
              'type'           => 'text',
              'title'          => 'Paste Time And Date',
              'desc'           => 'Time And Date Format "24 DEC 2014"'
            ),

          )
        ), 

        array(
          'id'      => $option_prifix.'_footer_map_image',
          'type'    => 'image',
          'title'   => 'Add Footer Map Image',
        ),

        array(
          'id'      => $option_prifix.'_footer_map_text',
          'type'    => 'text',
          'title'   => 'Add Footer Map Title',
        ),

  )
);


$options[]      = array(
  'name'        => 'footer_email',
  'title'       => 'Footer Email Settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_footer_about_tsdsitle',
          'type'    => 'email_descriptin',
          'title'   => 'MailChimp Config HTML Code',
          'desc'    => 'Edith this code and paste you MailChimp html form input box..',
        ),  
  )
);

$options[]      = array(
  'name'        => 'blog_single_settings',
  'title'       => 'Blog Single Page Setting',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_single_page_title',
          'type'    => 'text',
          'title'   => 'Blog Single Page Title'
        ),  
  )
);

$options[]      = array(
  'name'        => 'site_setting',
  'title'       => 'Site settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_scroll_to_top',
          'type'    => 'switcher',
          'title'   => 'Enable or Disable Scroll To Top Button'
        ),  
  )
);


$options[]      = array(
  'name'        => 'contact_setting',
  'title'       => 'Contact Us',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_gmap_api',
          'type'    => 'text',
          'title'   => 'Google Map API'
        ),  
        array(
          'id'      => $option_prifix.'_gmap_location_one',
          'type'    => 'text',
          'title'   => 'Google Map ID Before comma',
          'desc'    => 'Google Map Location ID Like <code>23.7945625,90.3451037</code> This. You Can Get It From Url..',
        ), 
        array(
          'id'      => $option_prifix.'_gmap_location_two',
          'type'    => 'text',
          'title'   => 'Google Map ID After comma',
          'desc'    => 'Google Map Location ID Like <code>23.7945625,90.3451037</code> This. You Can Get It From Url..',
        ),  
        array(
          'id'      => $option_prifix.'_gmap_color',
          'type'    => 'color_picker',
          'title'   => 'Google Map Color',
          'default' => '#FE980F',
          'rgba'    => false,
          'desc'    => 'Default Color Code <code>#FE980F</code>',
        ),
        array(
          'id'      => $option_prifix.'_gmap_zoomm',
          'type'    => 'range_slider',
          'title'   => 'Google Map Zoom',
          'default' => 15,
          'desc'    => 'Default Zoom <code>15</code>',
        ),  
        array(
          'id'      => $option_prifix.'_gmap_scrollwhee',
          'type'    => 'select',
          'title'   => 'Google Map Scrollwheel',
          'default' => 'no',
          'options'        => array(
            'yes'          => 'Yes',
            'no'           => 'No'
          ),
          'attributes' => array(
                'style'          => 'width:200px;'
              ),
          'desc'    => 'Default Option <code>No</code>',
        ), 
        array(
          'id'      => $option_prifix.'_gmap_lightnes',
          'type'    => 'range_slider',
          'title'   => 'Google Map Lightness',
          'default' => 20,
          'desc'    => 'Default Option <code>20</code>',
        ), 
        array(
          'id'      => $option_prifix.'_form_title',
          'type'    => 'text',
          'title'   => 'Contact Form Title'
        ),
        array(
          'id'      => $option_prifix.'_info_title',
          'type'    => 'text',
          'title'   => 'Contact Info Title'
        ),
        array(
          'id'      => $option_prifix.'_contact_social_title',
          'type'    => 'text',
          'title'   => 'Contact Social Title'
        ),
        array(
          'id'      => $option_prifix.'_contact_detaild',
          'type'    => 'wysiwyg',
          'title'   => 'Contact Details'
        ),

        array(
          'id'      => $option_prifix.'_contact_7_code',
          'type'    => 'textarea',
          'title'   => 'Contact Form 7 Shortcode'
        ),

  )
);



$options[]      = array(
  'name'        => 'for_404_setting',
  'title'       => '404 Page settings',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_404_big_image',
          'type'    => 'image',
          'title'   => 'Upload 404 Page Image Size 860 x 748 px'
        ),  
        array(
          'id'      => $option_prifix.'_404_title',
          'type'    => 'wysiwyg',
          'title'   => '404 Page Title'
        ),  
        array(
          'id'      => $option_prifix.'_404_description',
          'type'    => 'wysiwyg',
          'title'   => '404 Page description'
        ),  
        array(
          'id'      => $option_prifix.'_404_button_text',
          'type'    => 'text',
          'title'   => '404 Page Button Text'
        ),  
        array(
          'id'      => $option_prifix.'_404_button_url',
          'type'    => 'text',
          'title'   => '404 Page Button URL'
        ),  
  )
);



$options[]      = array(
  'name'        => 'contact_form_config',
  'title'       => 'Contact Form Config',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

        array(
          'id'      => $option_prifix.'_cnt_config',
          'type'    => 'cnt_config',
          'title'   => 'Contact Form Config',
          'desc'    => 'Paste this code in your contact form 7 form box..',
        ),  
  )
);


CSFramework::instance( $settings, $options );
