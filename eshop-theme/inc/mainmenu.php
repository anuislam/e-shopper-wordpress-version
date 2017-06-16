<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
wp_nav_menu( array(
        'theme_location' => 'main_menu',
        'menu' => 'main_menu',
        'menu_class' => 'nav navbar-nav collapse navbar-collapse',
        'container' => 'ul',
        'menu_id' => 'eshop_main_menu'
        //'walker'  => new WP_Bootstrap_Navwalker()
    ) );


