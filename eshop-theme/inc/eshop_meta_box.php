<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( eshop_root_path.'/cmb2/init.php' ) ) {
	require_once eshop_root_path.'/cmb2/init.php';
} elseif ( file_exists( eshop_root_path.'/CMB2/init.php' ) ) {
	require_once eshop_root_path.'/CMB2/init.php';
}





function eshop_slider_color_text( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
<div class="cmb-row <?php echo esc_attr( $classes ); ?>" data-fieldtype="slider_color_text">
	<div class="cmb-th">
		<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
	</div>
	<div class="cmb-td">
		
	<ul style="width:100%;display:block;float: left;">
		<li style="float:left;display:inline-block;margin-right:10px;">
			<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
				<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $description['first'] ); ?></label></p>
				<p><input style="width:150px;" id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>[first]" value="<?php echo (empty($value['first']) === false) ? $value['first'] : '' ; ?>"/></p>
				
			</div>
		</li>
		<li  style="float:left;display:inline-block;">
			<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
				<p><label for="<?php echo esc_attr( $id ); ?>-secc"><?php echo esc_html( $description['seccend'] ); ?></label></p>
				<p><input style="width:300px;" id="<?php echo esc_attr( $id ); ?>-secc" type="text" name="<?php echo esc_attr( $name ); ?>[seccend]" value="<?php echo (empty($value['seccend']) === false) ? $value['seccend'] : '' ; ?>" /></p>
				
			</div>
		</li>
	</ul>

	</div>
</div>	
	

	

	<?php
}


function eshop_slider_meta() {
	$prefix = 'eshop_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$eshop_slider = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Slider Meta', 'cmb2' ),
		'object_types'  => array( 'slider' ), 
	) );

	$eshop_slider->add_field( array(
		'name'       => 'Slider Title',
		'desc'       => array('first' => 'First color Text', 'seccend' => 'Seccend Coror Text'),
		'id'         => $prefix . 'slider_title',
		'type'       => 'slider_color_text',
		'render_row_cb' => 'eshop_slider_color_text',
	) );

	$eshop_slider->add_field( array(
		'name'       => esc_html__( 'Slider Description', 'cmb2' ),
		'desc'       => esc_html__( 'Slider Description', 'cmb2' ),
		'id'         => $prefix . 'slider_desc',
		'type'       => 'textarea_small' 
	) );

	$eshop_slider->add_field( array(
		'name'       => esc_html__( 'Slider Button text', 'cmb2' ),
		'desc'       => esc_html__( 'Slider Button text', 'cmb2' ),
		'id'         => $prefix . 'slider_text',
		'type'       => 'text' 
	) );
	
	$eshop_slider->add_field( array(
		'name'       => esc_html__( 'Slider Button URL', 'cmb2' ),
		'desc'       => esc_html__( 'Slider Button URL', 'cmb2' ),
		'id'         => $prefix . 'slider_url',
		'type'       => 'text' 
	) );
	
	$eshop_slider->add_field( array(
		'name' => esc_html__( 'Price Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );



	$product_meta = new_cmb2_box( array(
		'id'            => $prefix . 'echop_product_meta',
		'title'         => esc_html__( 'Product Meta', 'cmb2' ),
		'object_types'  => array( 'product' ), 
	) );

	$product_meta->add_field( array(
		'name' => esc_html__( 'Condition', 'cmb2' ),
		'desc' => esc_html__( 'Include Product Condition (Optional)', 'cmb2' ),
		'id'   => $prefix . 'prod_condition',
		'type' => 'text',
	) );

	$product_meta->add_field( array(
		'name' => esc_html__( 'Product activity', 'cmb2' ),
		'desc' => esc_html__( 'Product activity (Optional)', 'cmb2' ),
		'id'   => $prefix . 'prod_activity',
		'type' => 'select',
		'options' => array(
			'Old'  => 'Old',
			'New' => 'New'
		),
	) );

}

add_action( 'cmb2_admin_init', 'eshop_slider_meta' );




add_action( 'cmb2_init', function(){
	$is_allowed = true;
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
} );


