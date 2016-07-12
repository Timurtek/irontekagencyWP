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
 'service_link_class' => 'Service Tile Class',
 'service_link' => 'Service Link',
 'service_text' => 'Service Text',
 'image_id' => 'Image'
 ), $atts );

 $raw_image = new WP_Query( array( 'post_type' => 'attachment', 'attachment_id' => $a['image_id'] ));
 $image_url = $raw_image->posts[0]->guid;

 /* This is going to be our output */
 return "
  <div class='service_tile'>
    <div class='thumbnail'>
      <a class='gray_content' href='".esc_url( home_url( '/' ) )."{$a['service_link']}'>
        <img src='{$image_url}' />
      </a>
    </div>
    <div class='title'>
      <a class='gray_content {$a['service_link_class']}' href='".esc_url( home_url( '/' ) )."{$a['service_link']}'>
        <h3>{$a['service_text']}</h3>
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
           'type' => 'attach_image',
           'heading' => __( 'Image' ),
           'param_name' => 'image_id',
           'value' => __( 'Select an image' ),
           'description' => __( 'Select an image' )
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
      <option link='".esc_url( home_url( '/' ) )."branding-service'>BRANDING</option>
      <option link='".esc_url( home_url( '/' ) )."web-service'>WEB DESIGN</option>
      <option link='".esc_url( home_url( '/' ) )."landing-service'>LANDING PAGE</option>
      <option link='".esc_url( home_url( '/' ) )."email-service'>EMAIL MARKETING</option>
      <option link='".esc_url( home_url( '/' ) )."campaign-service'>CAMPAIGN</option>
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

/*Services Category*/
function slider_hero_shortcode( $atts ) {

/* These arguments are going to function like variables, allowing us to set new values in the front-end editor */
  $a = shortcode_atts( array(
 'slider_hero_text' => 'Button text',
 'slider_hero_link' => 'Link',
 'btn_class' => 'class'
 ), $atts );

 /* This is going to be our output */
 return "
 <div id = 'hero-slider' class = 'carousel slide'>

    <!-- Carousel indicators -->
    <ol class = 'carousel-indicators'>
       <li data-target = '#hero-slider' data-slide-to = '0' class = 'active'></li>
       <li data-target = '#hero-slider' data-slide-to = '1'></li>
       <li data-target = '#hero-slider' data-slide-to = '2'></li>
       <li data-target = '#hero-slider' data-slide-to = '3'></li>
    </ol>

    <!-- Carousel items -->
    <div class = 'carousel-inner'>
       <div class = 'item active'>
         <div class='wpb_wrapper text-center'>
          <div class='col-md-4 col-xs-12 text-center'>
            <img src='http://irontekagency.com/wp-content/uploads/2016/06/digital-marketing.png' />
          </div>
          <div class='col-md-8 col-xs-12'>
          <div class='section_title'>
            <h1 class='uppr'>Digital Marketing</h1>
            <div class='border_btm'></div>
          </div>
           <div class='wpb_raw_code wpb_content_element wpb_raw_html'>
             <div class='wpb_wrapper'>
               <p class='section_paragraph'>
                We specialize in understanding your customer’s journey from awareness to consideration to purchase. We offer solutions from email marketing to search engine optimization, running campaigns to digital advertising and maintain your branding and online reputation.
               </p>
             </div>
           </div>
         <a href='#' class='btn primary-btn uppr digital-select hire-us'>Start A Project</a>

          </div>
         </div>
       </div>

       <div class = 'item'>
         <div class='wpb_wrapper text-center'>
          <div class='col-md-4 col-xs-12 text-center'>
            <img src='http://irontekagency.com/wp-content/uploads/2016/06/resources-image.png'/>
          </div>
          <div class='col-md-8 col-xs-12'>
          <div class='section_title'>
            <h1 class='uppr'>Resources</h1>
            <div class='border_btm'></div>
          </div>
           <div class='wpb_raw_code wpb_content_element wpb_raw_html'>
             <div class='wpb_wrapper'>
               <p class='section_paragraph'>
                Our market platform offers quick solutions to finding the right themes, templates, images, videos, music, posters, business cards, photoshop and sketch files. Check our plans to learn more.
               </p>
             </div>
           </div>
         <a href='".esc_url( home_url( '/' ) )."resources' class='btn primary-btn uppr'>RESOURCES</a>
         <a href='".esc_url( home_url( '/' ) )."resources/deals' class='btn primary-btn uppr border margin-left-md no-xs-margin-left xs-margin-top-md'>DEALS</a>
          </div>
         </div>
       </div>

       <div class = 'item'>
         <div class='wpb_wrapper text-center'>
          <div class='col-md-4 col-xs-12 text-center'>
            <img src='http://irontekagency.com/wp-content/uploads/2016/06/design-dev.png' />
          </div>
          <div class='col-md-8 col-xs-12'>
          <div class='section_title'>
            <h1 class='uppr'>Design & Development</h1>
            <div class='border_btm'></div>
          </div>
           <div class='wpb_raw_code wpb_content_element wpb_raw_html'>
             <div class='wpb_wrapper'>
               <p class='section_paragraph'>
                We design and develop digital platforms, identities, campaigns and help you engage with your audience. We can help you with your new or existing product. Check our plans to learn more.
               </p>
             </div>
           </div>
         <a href='#' class='btn primary-btn uppr design-select hire-us'>Start A Project</a>
          </div>
         </div>
       </div>

       <div class = 'item'>
         <div class='wpb_wrapper text-center'>
          <div class='col-md-4 col-xs-12 text-center'>
            <img src='http://irontekagency.com/wp-content/uploads/2016/06/recruitment-icon.png' />
          </div>
          <div class='col-md-8 col-xs-12'>
          <div class='section_title'>
            <h1 class='uppr'>HR | Recruitment</h1>
            <div class='border_btm'></div>
          </div>
           <div class='wpb_raw_code wpb_content_element wpb_raw_html'>
             <div class='wpb_wrapper'>
               <p class='section_paragraph'>
                With our Recruitment platform, You will be able to find and post jobs. Our mission is to make recruitment process easier for talents, companies and possible investors.
               </p>
             </div>
           </div>
         <a href='".esc_url( home_url( '/' ) )."employees' class='btn primary-btn uppr hire-us'>FIND EMPLOYEES</a>
         <a href='".esc_url( home_url( '/' ) )."jobs' class='btn primary-btn uppr border margin-left-md no-xs-margin-left xs-margin-top-md'>FIND JOBS</a>
          </div>
         </div>
       </div>
    </div>

    <!-- Carousel nav -->
    <a class = 'carousel-control left' href = '#hero-slider' data-slide = 'prev'>&lsaquo;</a>
    <a class = 'carousel-control right' href = '#hero-slider' data-slide = 'next'>&rsaquo;</a>
 </div>
 ";
}

add_shortcode( 'slider_hero', 'slider_hero_shortcode' );

add_action( 'vc_before_init', 'slider_hero_WithVC' );

function slider_hero_WithVC() {
   vc_map( array(
      "name" => __( "Slider Hero", "my-text-domain" ),
      "base" => "slider_hero",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      "params" => array(
         array(
         'type' => 'textfield',
         'holder' => 'div',
         'class' => '',
         'heading' => __( 'Slider' ),
         'param_name' => 'slider_hero',
         'value' => __( 'Services Category Text' ),
         'description' => __( 'Enter button text here' )
         )
       )
       )
    );
}

?>
