<?php if ( ! defined( 'ABSPATH' ) ) { die('Cannot access pages directly.'); } // Cannot access pages directly.

function eshop_brand_count($id) {

    //return $count;
    $args = array(
      'post_type'     => 'product', //post type, I used 'product'
      'post_status'   => 'publish', // just tried to find all published post
      'posts_per_page' => -1,  //show all
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'brand',  //taxonomy name  here, I used 'product_cat'
          'field' => 'id',
          'terms' => array( $id )
        )
      )
    );

    $query = new WP_Query( $args);

    return (int)$query->post_count;

}



function eshop_single_tab_add_item($item){
  $item['description'] = Array
        (
            'title'     => 'Description',
            'priority'  => 10,
            'callback'  => 'eshop_product_description_tab'
        );
  return $item;
}
add_filter( 'woocommerce_product_tabs', 'eshop_single_tab_add_item' );

function eshop_product_description_tab(){
  global $product;
  ?>
<article class="col-sm-12 fix">

<h2 class="title text-center"><?php echo $product->get_name(); ?></h2>
<p>
  <?php echo $product->get_description(); ?>
</p>
</article>
  <?php
}



function eshop_cart_image($image){
  $cart_image = wp_get_attachment_image_src( $image->get_image_id(), 'eshop_cart_image' );
  return '<img src="'.$cart_image[0].'" alt="'.$image->get_name().'">';
}
add_filter('woocommerce_cart_item_thumbnail', 'eshop_cart_image');









add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {

          $field['class'][] = 'form-group';
          $field['input_class'][] = 'form-control';
          
        }
    }
    return $fields;
}

add_filter('woocommerce_order_formatted_billing_address', 'eshop_order_formatted_billing_address');



function  eshop_order_formatted_billing_address($data){

ob_start();
?>

<table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

  <tr>
    <th>First Name:</th>
    <td><?php echo $data['first_name']; ?></td>
  </tr>
  <tr>
    <th>Last Name:</th>
    <td><?php echo $data['last_name']; ?></td>
  </tr>
  <tr>
    <th>Company:</th>
    <td><?php echo $data['company']; ?></td>
  </tr>
  <tr>
    <th>Address One:</th>
    <td><?php echo $data['address_1']; ?></td>
  </tr>
  <tr>
    <th>Address Two:</th>
    <td><?php echo $data['address_2']; ?></td>
  </tr>
  <tr>
    <th>City:</th>
    <td><?php echo $data['city']; ?></td>
  </tr>
  <tr>
    <th>State:</th>
    <td><?php echo $data['state']; ?></td>
  </tr>
  <tr>
    <th>Postcode:</th>
    <td><?php echo $data['postcode']; ?></td>
  </tr>
  <tr>
    <th>Country:</th>
    <td><?php echo $data['country']; ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?php echo $data['email']; ?></td>
  </tr>
  <tr>
    <th>Phone:</th>
    <td><?php echo $data['phone']; ?></td>
  </tr>

</table>
<?php
$getclean = ob_get_contents();
return $getclean;

}

function eshop_get_currency_symbol($price) {
    $pos      = get_option('woocommerce_currency_pos');
    $currency = get_woocommerce_currency_symbol();
    if ($pos == 'left') {
      return $currency.$price;
    }else if ($pos == 'right'){
       return $price.$currency;
    }else if ($pos == 'left_space'){
      return $currency.' '.$price;
    }else if ($pos == 'right_space'){
      return $price.' '.$currency;
    }else{
      return $currency;
    }
    
}


add_filter('pre_get_posts', function($query){

  if (is_search()) {
    if ($query->is_search) {
      $query->set('post_type', 'product');
    }
  }
  
});


function excerpt($num) {
  $limit = $num+1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt);
  return $excerpt;
}

function esop_paginate_links($query = null){

  global $wp_query;
  if ($query === null) {
    $query = $wp_query;
  }

    $eshop_pagi = paginate_links( apply_filters( 'eshop_pagination_args', array(
      'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
      'format'       => '',
      'add_args'     => false,
      'current'      => max( 1, get_query_var( 'paged' ) ),
      'total'        => $query->max_num_pages,
      'prev_text'    => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
      'next_text'    => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
      'type'         => 'array',
      'end_size'     => 3,
      'mid_size'     => 3,
    ) ) );
    if (!empty($eshop_pagi)) {
      if (is_array($eshop_pagi)) {
        foreach ($eshop_pagi as $pagi) {
          echo '<li>'.$pagi.'</li>';
        }
      }
    }

};


    function eshop_format_comment($comment, $args, $depth) {    
       $GLOBALS['comment'] = $comment; 
       ?>


  <li <?php comment_class('media'); ?> id="comment-<?php comment_ID() ?>" >
    
    <a class="pull-left" href="<?php echo get_author_posts_url( $comment->user_id ); ?>">
      <?php echo get_avatar( $comment->user_id, '121' ); ?> 
    </a>
    <div class="media-body">
      <ul class="sinlge-post-meta">
        <li><i class="fa fa-user"></i><?php echo $comment->comment_author; ?></li>
        <li><i class="fa fa-clock-o"></i><?php echo get_comment_time( 'g:i a' ); ?></li>
        <li><i class="fa fa-calendar"></i><?php echo get_comment_date( 'M d, Y', $comment->comment_ID ); ?></li>
      </ul>
      <p><?php echo $comment->comment_content; ?></p>

<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

    </div>
    <?php if ($comment->comment_approved == '0') : ?>
      <div class="eshop_awaiting_moderation"><?php _e('Your comment is awaiting moderation.') ?></div>
    <?php endif; ?>
  </li>



        
<?php } 








