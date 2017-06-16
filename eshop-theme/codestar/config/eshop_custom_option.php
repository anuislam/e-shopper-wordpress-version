<?php

class CSFramework_Option_email_descriptin extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();

	echo '<code>'.htmlentities('<input type="email" name="You Input Nield Name" placeholder="Your Custom Message" required="">').'</code><br><br>';
	echo '<code>'.htmlentities('<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>').'</code><br><br>';
	echo '<code>'.htmlentities('<p>Get the most recent updates from <br />our site and be updated your self...</p>').'</code><br>';

    echo $this->element_after();

  }

}



class CSFramework_Option_range_slider extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();
?>
<div style="max-width:600px;" class="outer_range">
  <input
      type="text" 
      data-type="eshop_range"                
      value="<?php echo $this->element_value(); ?>"
      name="<?php echo $this->element_name(); ?>" 
      <?php echo $this->element_class(); ?>                
      <?php echo $this->element_attributes(); ?>   
  >
</div>

<script>
  jQuery(document).ready(function($){

    $('input[data-type="eshop_range"]').jRange({
        from: 1,
        to: 100,
        steEp: 1,
        width: 500,
        showLabels: true
    });


  });
</script>

<?php
    echo $this->element_after();

  }

}



class CSFramework_Option_cnt_config extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();

  echo '<code>'.htmlentities('<div class="form-group col-md-6"> [text* text-972 class:form-control placeholder"Name"] </div> <div class="form-group col-md-6"> [email* email-316 class:form-control placeholder"Email"] </div> <div class="form-group col-md-12"> [text* text-972 class:form-control placeholder"Subject"] </div> <div class="form-group col-md-12"> [textarea* textarea-507 id:message class:form-control rows:8 placeholder"Your Message Here"] </div> <div class="form-group col-md-12"> [submit class:btn class:btn-primary class:pull-right "Submit"] </div>').'</code>';

  echo '<br /><br /><code>And paste this code in your form shortcode attributes <strong>'. htmlentities('html_id="main-contact-form" html_class="contact-form row"').'</strong></code>';
  echo '<br /><br /> `<code>Like This code <strong>'.htmlentities('[contact-form-7 id="4" title="Contact form 1" html_id="main-contact-form" html_class="contact-form row"]').'</strong></code>`';

    echo $this->element_after();

  }

}