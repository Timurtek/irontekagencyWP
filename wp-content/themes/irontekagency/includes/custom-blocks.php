<?php

/*Title Dark*/
function section_title_dark_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
        $a = shortcode_atts( array(
 'text_heading' => 'This is the default heading text',
 'class_name' => 'Class name'
 ), $atts );

 /* This is going to be our output */
 return "
 <div class='section_title {$a['class_name']}'>
   <h1 class='uppr'>{$a['text_heading']}</h1>
   <div class='border_btm'></div>
 </div>";
}

add_shortcode( 'section_title_dark', 'section_title_dark_shortcode' );

add_action( 'vc_before_init', 'Dark_title_WithVC' );

function Dark_title_WithVC() {
   vc_map( array(
      "name" => __( "Section Title Dark", "my-text-domain" ),
      "base" => "section_title_dark",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      // 'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      // 'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
      "params" => array(
         array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __( 'Text Heading' ),
         'param_name' => 'text_heading',
         'value' => __( 'Default Heading Text' ),
         'description' => __( 'Enter heading text here' )
       ),
       array(
       'type' => 'textfield',
       'holder' => 'div',
       'class' => '',
       'heading' => __( 'Text Heading' ),
       'param_name' => 'class_name',
       'value' => __( 'Class Name' ),
       'description' => __( 'Enter classname here' )
       )
       )
       )
    );
}


/*Primary Button*/
function primary_button_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
  $a = shortcode_atts( array(
 'primary_button_text' => 'Button text',
 'primary_button_link' => 'Link',
 'btn_class' => 'class'
 ), $atts );

 /* This is going to be our output */
 return "<a href='".esc_url( home_url( '/' ) )."{$a['primary_button_link']}' class='btn primary-btn uppr {$a['btn_class']}'>{$a['primary_button_text']}</a>";
}

add_shortcode( 'primary_button', 'primary_button_shortcode' );

add_action( 'vc_before_init', 'primary_button_WithVC' );

function primary_button_WithVC() {
   vc_map( array(
      "name" => __( "Primary Button", "my-text-domain" ),
      "base" => "primary_button",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      "params" => array(
         array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Button Text' ),
 'param_name' => 'primary_button_text',
 'value' => __( 'Default Button Text' ),
 'description' => __( 'Enter button text here' )
 ),
 array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Link' ),
 'param_name' => 'primary_button_link',
 'value' => __( 'http://wwww.' ),
 'description' => __( 'Enter link text here' )
 ),
   array(
  'type' => 'textfield',
  'holder' => 'div',
  'class' => '',
  'heading' => __( 'Button Class' ),
  'param_name' => 'btn_class',
  'value' => __( 'Button Class' ),
  'description' => __( 'Enter button classname here' )
  )
       )
       )
    );
}


/*Default Button*/
function default_button_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
  $a = shortcode_atts( array(
 'default_button_text' => 'Button text',
 'default_button_link' => 'Link',
 'btn_class' => 'class'
 ), $atts );

 /* This is going to be our output */
 return "<a href='".esc_url( home_url( '/' ) )."{$a['default_button_link']}' class='btn default-btn uppr {$a['btn_class']}'>{$a['default_button_text']}</a>";
}

add_shortcode( 'default_button', 'default_button_shortcode' );

add_action( 'vc_before_init', 'default_button_WithVC' );

function default_button_WithVC() {
   vc_map( array(
      "name" => __( "Default Button", "my-text-domain" ),
      "base" => "default_button",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      "params" => array(
         array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Button Text' ),
 'param_name' => 'default_button_text',
 'value' => __( 'Default Button Text' ),
 'description' => __( 'Enter button text here' )
 ),
 array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Link' ),
 'param_name' => 'default_button_link',
 'value' => __( 'http://wwww.' ),
 'description' => __( 'Enter link text here' )
 ),
   array(
  'type' => 'textfield',
  'holder' => 'div',
  'class' => '',
  'heading' => __( 'Button Class' ),
  'param_name' => 'btn_class',
  'value' => __( 'Button Class' ),
  'description' => __( 'Enter button classname here' )
  )
       )
       )
    );
}


/* Service tile */
function service_tile_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
  $a = shortcode_atts( array(
 'svg_code' => 'SVG Code',
 'service_link_class' => 'Service Tile Class',
 'service_link' => 'Service Link',
 'service_text' => 'Service Text'
 ), $atts );

 /* This is going to be our output */
 return "
  <div class='service_tile'>
    <div class='thumbnail'>
      {$a['svg_code']}
    </div>
    <div class='title'>
      <a class='gray_content {$a['service_link_class']}' href='".esc_url( home_url( '/' ) )."{$a['service_link']}'>
        {$a['service_text']}
      </a>
    </div>
  </div>
 ";
}

add_shortcode( 'service_tile', 'service_tile_shortcode' );

add_action( 'vc_before_init', 'service_tile_WithVC' );

function service_tile_WithVC() {
   vc_map( array(
      "name" => __( "SVG Thumbnail", "my-text-domain" ),
      "base" => "service_tile",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      "params" => array(
         array(
           'type' => 'textarea',
           'heading' => __( 'SVG Code' ),
           'param_name' => 'svg_code',
           'value' => __( 'Default Button Text' ),
           'description' => __( 'Enter button text here' )
         ),
         array(
           'type' => 'textfield',
           'holder' => 'div',
           'class' => '',
           'heading' => __( 'Service Link Class' ),
           'param_name' => 'service_link_class',
           'value' => __( '' ),
           'description' => __( 'Service Link Class' )
           ),
           array(
             'type' => 'textfield',
             'holder' => 'div',
             'class' => '',
             'heading' => __( 'Service Link' ),
             'param_name' => 'service_link',
             'value' => __( '' ),
             'description' => __( 'Service Link' )
           ),
           array(
             'type' => 'textfield',
             'holder' => 'div',
             'class' => '',
             'heading' => __( 'Service Link Text' ),
             'param_name' => 'service_text',
             'value' => __( '' ),
             'description' => __( 'Service Link text' )
             )
       )
       )
    );
}


/*Services Category*/
function services_cat_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
  $a = shortcode_atts( array(
 'services_cat_text' => 'Button text',
 'services_cat_link' => 'Link',
 'btn_class' => 'class'
 ), $atts );

 /* This is going to be our output */
 return "
 <div class='services_cat_btn margin-top-md'>
    <select class='form-control'>
      <option link='".esc_url( home_url( '/' ) )."branding'>BRANDING</option>
      <option link='".esc_url( home_url( '/' ) )."web-design-and-development'>WEB DESIGN</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>APP DESIGN</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>LANDING PAGE</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>STRATEGY</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>SOCIAL</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>EMAIL MARKETING</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>CAMPAIGN</option>
      <option link='".esc_url( home_url( '/' ) )."branding'>SEARCH ENGINE OPTIMIZATION</option>
    </select>
  </div>
 ";
}

add_shortcode( 'services_cat', 'services_cat_shortcode' );

add_action( 'vc_before_init', 'services_cat_WithVC' );

function services_cat_WithVC() {
   vc_map( array(
      "name" => __( "Services Category", "my-text-domain" ),
      "base" => "services_cat",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      "params" => array(
         array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Button Text' ),
 'param_name' => 'services_cat_text',
 'value' => __( 'Services Category Text' ),
 'description' => __( 'Enter button text here' )
 ),
 array(
 'type' => 'textfield',
 'holder' => 'div',
 'class' => '',
 'heading' => __( 'Link' ),
 'param_name' => 'services_cat_link',
 'value' => __( 'http://wwww.' ),
 'description' => __( 'Enter link text here' )
 ),
   array(
  'type' => 'textfield',
  'holder' => 'div',
  'class' => '',
  'heading' => __( 'Button Class' ),
  'param_name' => 'btn_class',
  'value' => __( 'Button Class' ),
  'description' => __( 'Enter button classname here' )
  )
       )
       )
    );
}


?>
