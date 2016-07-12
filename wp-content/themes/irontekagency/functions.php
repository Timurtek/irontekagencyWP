<?php
/**
 * irontekagency functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package irontekagency
 */
 require_once ( "includes/custom-blocks.php");
 require_once ( "includes/themestudio_vc_functions.php");
if ( ! function_exists( 'irontekagency_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function irontekagency_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on irontekagency, use a find and replace
	 * to change 'irontekagency' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'irontekagency', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'irontekagency' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'irontekagency_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'irontekagency_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function irontekagency_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'irontekagency_content_width', 640 );
}
add_action( 'after_setup_theme', 'irontekagency_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function irontekagency_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'irontekagency' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'irontekagency' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'irontekagency_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function irontekagency_scripts() {
	wp_enqueue_style( 'irontekagency-style', get_stylesheet_uri() );
  wp_enqueue_script( 'irontekagency-jquery', 'https://code.jquery.com/jquery-1.9.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'irontekagency-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'irontekagency-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151216', true );
  wp_enqueue_script( 'irontekagency-func', get_template_directory_uri() . '/js/func.js', array(), '20151216', true );
	wp_enqueue_script( 'irontekagency-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
//https://code.jquery.com/jquery-3.0.0.min.js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'irontekagency_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


class BS3_Walker_Nav_Menu extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];

		if ( isset( $args[0] ) && is_object( $args[0] ) )
		{
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( is_object($args) && !empty($args->has_children) && $item->menu_item_parent == 0 )
		{
			$link_after = $args->link_after;
			$args->link_after = ' <b class="caret"></b>';
		}

		parent::start_el($output, $item, $depth, $args, $id);

		if ( is_object($args) && !empty($args->has_children) )
			$args->link_after = $link_after;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = '';
		$output .= "$indent<ul class=\"dropdown-menu list-unstyled\">";
	}
}

add_filter('nav_menu_link_attributes', 'nav_link_att', 10, 3);

function nav_link_att($atts, $item, $args) {
	if ( $args->has_children && $item->menu_item_parent == 0 )
	{
		$atts['data-toggle'] = 'dropdown';
		$atts['class'] = 'dropdown-toggle';
	}
	return $atts;
}

show_admin_bar( false );

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');


//Single category
add_filter('single_template', 'my_single_template');
function my_single_template($single) {
    $category = get_the_category();
	if(file_exists(get_template_directory() . '/single-' .$category[0]->slug. '.php'))
		return get_template_directory() . '/single-' . $category[0]->slug. '.php';
	return $single;
}


/*Widget Register*/
function footer1_init() {

	register_sidebar( array(
		'name'          => 'Footer1',
		'id'            => 'footer1',
		'before_widget' => '<div class="footer-item col-md-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'footer1_init' );

function footer2_init() {

	register_sidebar( array(
		'name'          => 'Footer2',
		'id'            => 'footer2',
		'before_widget' => '<div class="footer-item col-md-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'footer2_init' );


function footer3_init() {

	register_sidebar( array(
		'name'          => 'Footer3',
		'id'            => 'footer3',
		'before_widget' => '<div class="footer-item col-md-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'footer3_init' );

function footer4_init() {

	register_sidebar( array(
		'name'          => 'Footer4',
		'id'            => 'footer4',
		'before_widget' => '<div class="footer-item col-md-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'footer4_init' );

function blog_sidebar_init() {

	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog_sidebar',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'blog_sidebar_init' );

function login_area_init() {

	register_sidebar( array(
		'name'          => 'Login Area',
		'id'            => 'login_area',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>')
	);

}
add_action( 'widgets_init', 'login_area_init' );



//favicon
function childtheme_favicon() { ?>
<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/favico.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php echo bloginfo('stylesheet_directory') ?>/images/iphone-icon.png"/>
<?php }
add_action('wp_head', 'childtheme_favicon');


function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login.min.css" />';
}
add_action('login_head', 'my_custom_login');



function admin_login_redirect( $redirect_to, $request, $user ){
  global $user;
  if( isset( $user->roles ) && is_array( $user->roles ) ) {
    if( in_array( "administrator", $user->roles ) ) {
    return $redirect_to;
    }else {
    return home_url();
    }
  }
  else{ return $redirect_to; }
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);


function my_login_logo_url() {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
  return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.

 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." value="' . get_search_query() . '" name="s" id="s">
      <span class="input-group-btn">
        <button class="btn default-btn dark" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'"><i class="fa fa-search" aria-hidden="true"></i></button>
      </span>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


//remove width and height from featured post thumbnail images
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
//remove class from the_post_thumbnail
function the_post_thumbnail_remove_class($output) {
        $output = preg_replace('/class=".*?"/', '', $output);
        return $output;
}
add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');


//short title
function short_title($pos){
  $pos=strpos($content, ' ', 200);
  substr($content,0,$pos );

  return $content;
}


//Pagination// Numbered Pagination
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}


  //shortcode check
  function price_id($tempCheck){

    $tempContent = get_the_content();
    $tempVerify = strpos($tempContent,$tempCheck);
    $pattern = '@purchase_link id="(.*?)"@si';
    preg_match_all($pattern,$tempContent,$matches);

    if(!$tempVerify === false) {
      $idnum = $matches[1][0];
      return $idnum;
    }
  }

  function price_id2(){
    echo get_post_meta($post->ID, $download , true);
  }



//user profile methods
  function modify_contact_methods($profile_fields) {

  	// Add new fields
  	$profile_fields['twitter'] = 'Twitter Username';
  	$profile_fields['facebook'] = 'Facebook URL';
  	$profile_fields['gplus'] = 'Google+ URL';
    $profile_fields['github'] = 'Github';
    $profile_fields['dribbble'] = 'Dribbble';
    $profile_fields['behance'] = 'Behance';

  	// Remove old fields
  	unset($profile_fields['aim']);

  	return $profile_fields;
  }
  add_filter('user_contactmethods', 'modify_contact_methods');


  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );
