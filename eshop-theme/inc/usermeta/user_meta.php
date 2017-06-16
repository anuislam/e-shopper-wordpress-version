<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.
function eshop_user_information($user){
?>
<table class="form-table">
<?php

$eshop_user_option = apply_filters('eshop_option_init', null);

if ($eshop_user_option !== null) {
	if (!empty($eshop_user_option)) {
		if (is_array($eshop_user_option)) {
			foreach ($eshop_user_option as $value) {
				eshop_make_user_mata($value, get_the_author_meta( $value['id'], $user->ID ) );
			}
		}
	}
}
?>


</table>

<?php
}
add_action('show_user_profile', 'eshop_user_information');
add_action('edit_user_profile', 'eshop_user_information');

function eshop_make_user_mata($key, $value){
	$key 	= (array)$key;
?>

	<tr>
		<th scope="row" ><label for="<?php echo @$key['id']; ?>"><?php echo @$key['title']; ?></label></th>
		<td>
			<input 
				type="text" 
				name="<?php echo @$key['id']; ?>" 
				id="<?php echo @$key['id']; ?>" 
				value="<?php echo esc_attr( $value ); ?>" 
				class="regular-text ltr" /><br />
			<span class="description"><?php echo ($key['description']) ? $key['description'] : '' ; ?></span>
		</td>
	</tr>


<?php
}



function eshop_user_information_save( $user_id ) {

	$eshop_user_option = apply_filters('eshop_option_init', null);


	if ($eshop_user_option !== null) {
		if (!empty($eshop_user_option)) {
			if (is_array($eshop_user_option)) {
				foreach ($eshop_user_option as $value) {
					if ( current_user_can( 'edit_user', $user_id ) ){
						if (empty($_POST) === false) {
							if (empty($_POST[$value['id']]) === false) {
								$user_data = esc_url($_POST[$value['id']]);
								update_usermeta( $user_id, $value['id'], $user_data );
							}
						}
					}
				}
			}
		}
	}

}
add_action( 'personal_options_update', 'eshop_user_information_save' );
add_action( 'edit_user_profile_update', 'eshop_user_information_save' );



function eshop_option_init_func($option){
	$option[] = array(
		'title' 		=> 'Facebook Profile',
		'id' 			=> 'facebook',
		'description' 	=> 'Enter your Facebook Profile url',
	);

	$option[] = array(
		'title' 		=> 'Twitter Profile',
		'id' 			=> 'twitter',
		'description' 	=> 'Enter your Twitter Profile url',
	);

	$option[] = array(
		'title' 		=> 'Linked In Profile',
		'id' 			=> 'linkedin',
		'description' 	=> 'Enter your Linked In Profile url',
	);

	$option[] = array(
		'title' 		=> 'Google Plus Profile',
		'id' 			=> 'google',
		'description' 	=> 'Enter your Google Plus Profile url',
	);

	$option[] = array(
		'title' 		=> 'Pinterest Profile',
		'id' 			=> 'pinterest',
		'description' 	=> 'Enter your pinterest url',
	);

	return $option;
}
add_filter('eshop_option_init', 'eshop_option_init_func');