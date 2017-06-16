<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
wp_nav_menu( array(
        'theme_location' => 'top_menu',
        'menu' => 'top_menu',
        'menu_class' => 'nav navbar-nav',
        'container' => 'ul',
        'menu_id' => 'eshop_top_menu'
        //'walker'  => new WP_Bootstrap_Navwalker()
    ) );


