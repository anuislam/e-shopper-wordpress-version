<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>
<div class="breadcrumbs">

<?php
	$args = array(
			'delimiter' 	=> '',
			'wrap_before' 	=> '<ol class="breadcrumb">',
			'wrap_after'  	=> '</ol>',
			'before' 		=> '<li>',
			'after'       	=> '</li>',
	);
?>
<?php woocommerce_breadcrumb($args); ?>

</div>
