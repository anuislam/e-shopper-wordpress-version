/*price range*/

jQuery('#sl2').slider();

	var RGBChange = function() {
	  jQuery('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
	


/*scroll to top*/
jQuery(document).ready(function($){

if (eshop_local.single_product == 'yes') {

	jQuery("#eshop_shop_single_image").xzoom({
		tint: '#333', 
		position: 'right', 
		title: true, 
		hover: true,
		Yoffset: 0, 
		Xoffset: 15
	});

}


setTimeout(function(){
var src = $('.woocommerce-product-gallery__image a img').attr('data-src');
$('.woocommerce-product-gallery__image a img').attr('xoriginal', src);
}, 100);

 $('form.cart').on( 'change', '.variations select', function( event ) {
setTimeout(function(){
	var src = $('.woocommerce-product-gallery__image a img').attr('data-src');
	$('.woocommerce-product-gallery__image a img').attr('xoriginal', src);
}, 100);
});



//Example: Integration with "Magnific Popup" plugin
$('#eshop_shop_single_image').live('click', function() {
  var xzoom = $(this).data('xzoom');
  xzoom.closezoom();
	var i = 0;
	var images = new Array();
	images[i] 	     = {src: $(this).attr('data-src')};
	i++;
  $('img[eshop_xzoom_gal="xzoom_gal"]').each(function(){
  	var gallery_link = $(this).attr('data-src');
	images[i] 	     = {src: gallery_link};
	i++;
  });
  $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
  event.preventDefault();
});


$('a#eshop_gall_to_mail').on('click', function(){
	var eshop_xzoom_image = $('#eshop_shop_single_image');
	var var_woo_gall_var_image = $('.woocommerce-product-gallery__image');

	var t_image 		  = $(this).find('img').attr('eshop_xzoom_main_image');
	var full_image 		  = $(this).find('img').attr('data-src');
	var large_image 	  = $(this).find('img').attr('data-large_image');
	var large_image_width = $(this).find('img').attr('large_image_width');
	var large_image_height = $(this).find('img').attr('large_image_height');




	eshop_xzoom_image.attr('src', t_image);
	eshop_xzoom_image.attr('xoriginal', 		full_image);
	eshop_xzoom_image.attr('data-src',  		full_image);
	eshop_xzoom_image.attr('data-large_image',  large_image);
	eshop_xzoom_image.attr('data-large_image',  large_image_width);
	eshop_xzoom_image.attr('data-large_image',  large_image_height);
	var_woo_gall_var_image.attr('data-thumb',  full_image);
	var_woo_gall_var_image.find('a').attr('data-thumb',  full_image);
	var_woo_gall_var_image.find('a').find('img').attr('srcset',  t_image);
});

$('.woocommerce-product-gallery__image').on('click',function(e){
	e.preventDefault();
});

	$('p.form-submit input[type="submit"]').removeAttr('id').removeClass('submit').addClass('btn btn-primary pull-right white');
	$(function () {
		if (eshop_local.scroll_to_top == 'yes') {
			$.scrollUp({
		        scrollName: 'scrollUp', // Element ID
		        scrollDistance: 300, // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top', // 'top' or 'bottom'
		        scrollSpeed: 300, // Speed back to top (ms)
		        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
		        animation: 'fade', // Fade, slide, none
		        animationSpeed: 200, // Animation in speed (ms)
		        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
						//scrollTarget: false, // Set a custom target element for scrolling to the top
		        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
		        scrollTitle: false, // Set a custom <a> title if required.
		        scrollImg: false, // Set true to use image
		        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		        zIndex: 2147483647 // Z-Index for the overlay
			});
		};

	});

	$('#eshop_social_share').jsSocials({
    
        url: eshop_local.eshop_permalink,
         text: eshop_local.eshop_title,
          shareIn: 'popup',
           showLabel: false,
            showCount: false,
             shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
    }

    );
$('div.cart_quantity_button div.quantity label').remove();

as_html_remove_tag('quantity', 'class');


$('input[type="number"].qty').removeClass('input-text qty text').addClass('cart_quantity_input').attr('size', 2);

$('p.order-again a').removeClass('button').addClass('btn btn-default add-to-cart');
$('div.breadcrumbs ol.breadcrumb li:last-child').addClass('active');
$('a.comment-reply-link').addClass('btn btn-primary').html('<i class="fa fa-reply"></i>Replay');
$('ul.children').addClass('media-list').removeClass('children').find('li.comment').addClass('media second-media');

if (eshop_local.loged_id_user == 'yes') {

	$('div#eshop_check_div').addClass('col-sm-12').removeClass('col-sm-8');

};

$('a.comment-reply-link').live('click', function(){
	$('div#respond').addClass('replay-box');
});



$('div a#eshop_100_footer').on('click', function(e){
	e.preventDefault();
	var video_link = $(this).attr('href');

	var video_title = $(this).attr('data-title');
	var main_modal = $('div#eshop_video_modal');
	main_modal.modal('show').find('.modal-body').html('<div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="'+video_link+'" id="esho_testimonial_video"></iframe></div>');
	main_modal.find('.modal-title').html(video_title);
});


$('div#eshop_video_modal').on('hide.bs.modal', function(){	
	var modal_close = $(this);
	setTimeout(function(){ 
		modal_close.find('.modal-body').find('div').remove();
		modal_close.find('.modal-titley').html(' ');
	 }, 500);
});


$('div.col-sm-2 div.single-widget ul').addClass('nav nav-pills nav-stacked');
$('div#eshop_mail_form form').addClass('searchform');

$('div.cart_quantity_button').find('input[type="number"]').css('margin', '0').css('height', '28px');

$('a.cart_quantity_up').on('click', function(e){
	e.preventDefault();
	var main_input = $(this).closest('div.cart_quantity_button').find('input[type="number"]');
	var cart_quantity_up = main_input.val();
		plus_val = parseInt(cart_quantity_up) + 1;
		main_input.val(plus_val);
	$('input#eshop_update_cart').removeAttr('disabled');
});


$('a.cart_quantity_down').on('click', function(e){
	e.preventDefault();
	var main_input = $(this).closest('div.cart_quantity_button').find('input[type="number"]');
	var cart_quantity_down = main_input.val();
		minus_val = parseInt(cart_quantity_down) - 1;
		if (minus_val > 1) {

			main_input.val(minus_val);
			$('input#eshop_update_cart').removeAttr('disabled');
		};
	
});


});



function as_html_remove_tag(as_tag, tag = 'id'){
	
	if (tag == 'tag') {
		var anub = document.getElementsByTagName(as_tag);
	}else if(tag == 'class'){
		var anub = document.getElementsByClassName(as_tag);
	}else if(tag == 'id'){
		var anub = document.getElementById(as_tag);
	}
	//var anub = jQuery(as_tag);
	while(anub.length) {
	    var parent = anub[ 0 ].parentNode;
	    while( anub[ 0 ].firstChild ) {
	        parent.insertBefore(  anub[ 0 ].firstChild, anub[ 0 ] );
	    }
	     parent.removeChild( anub[ 0 ] );
	}
}

