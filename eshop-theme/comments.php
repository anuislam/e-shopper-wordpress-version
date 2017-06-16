<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.?>

<?php

if ( post_password_required() ) {
	return;
}
?>
<div class="response-area">
	<h2>
			<?php
				$comments_number = get_comments_number();
				if ( '0' === $comments_number ) {
					/* translators: %s: post title */
					echo 'NO RESPONSE';
				} else if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					echo '1 RESPONSE';
				} else {
					echo $comments_number.' RESPONSES';
				}
			?>


		
	</h2>
	<ul class="media-list">
		<?php wp_list_comments('type=comment&callback=eshop_format_comment'); ?>
	</ul>
</div><!--/Response-area-->
