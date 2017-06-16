<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.

define('eshop_root_path', get_template_directory());
define('eshop_root_url', get_template_directory_uri());
define('eshop_site_url', site_url());

/*************************************
*tgm plugin
*************************************/
require_once(eshop_root_path.'/inc/tgmactiv.php');

//**********************************
// after theme setup
//**********************************

require_once(eshop_root_path.'/inc/setup_theme.php');


//**********************************
// call all scripts files
//**********************************

require_once(eshop_root_path.'/inc/scripts.php');

//**********************************
// cmb 2 meta box
//**********************************

require_once(eshop_root_path.'/inc/eshop_meta_box.php');


//**********************************
// theme option
//**********************************

require_once(eshop_root_path.'/codestar/cs-framework.php');



//**********************************
// Eeditional Functions
//**********************************

require_once(eshop_root_path.'/inc/editional_functions.php');

//**********************************
// Woocommerce function
//**********************************

require_once(eshop_root_path.'/inc/woocommerce_func/remove_action.php');
require_once(eshop_root_path.'/inc/woocommerce_func/add_action.php');

/*************************************
* user meta
*************************************/

require_once(eshop_root_path.'/inc/usermeta/user_meta.php');


