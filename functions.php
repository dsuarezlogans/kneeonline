<?php

@ini_set ('upload_max_size', '64M');
/**
 * footankle functions and definitions
 *
 * @package footankle
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'footankle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function footankle_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on footankle, use a find and replace
	 * to change 'footankle' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'footankle', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => 'Primary Menu',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'footankle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_image_size( 'custom-block', 960, 600, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
	add_image_size( 'custom-faculty', 960, 720, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
}
endif; // footankle_setup
add_action( 'after_setup_theme', 'footankle_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function footankle_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'footankle' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'footankle' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div class="footer-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="footer-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'footankle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function footankle_scripts() {
	wp_enqueue_style( 'footankle-style', get_stylesheet_uri() );

	wp_enqueue_script( 'footankle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'footankle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	//load font awsome style stylesheet
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

	// Make WordPress Retina Ready
	//wp_enqueue_script( 'jk_retina', get_template_directory_uri() . '/js/retina.min.js', null, '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'footankle_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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



function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<main id="main" class="site-main" role="main">';
}

function my_theme_wrapper_end() {
  echo '</main>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function default_no_quantities( $individually, $product ){
$individually = true;
return $individually;
}
add_filter( 'woocommerce_is_sold_individually', 'default_no_quantities', 10, 2 );

add_filter('woocommerce_prevent_admin_access', 'check_admin_access');
function check_admin_access( $redirect_to ) {
  $user = wp_get_current_user();
  if( is_array( $user->roles ) &&  !in_array( 'customer', $user->roles ) &&
  									!in_array( 'suscriptor', $user->roles )) {
    return false;
  }
  return true;
}

/*--- GET ID FROM SLUG ----*/
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

add_action('woocommerce_after_shop_loop_item','woocommerce_template_single_excerpt', 5);


add_filter('protected_title_format', 'ntwb_remove_protected_title');
function ntwb_remove_protected_title($title) {
	return '%s';
}

add_filter('private_title_format', 'ntwb_remove_private_title');
function ntwb_remove_private_title($title) {
	return '%s';
}
function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Incluir NIF en la factura

add_filter( 'wpo_wcpdf_billing_address', 'incluir_nif_en_factura' );

function incluir_nif_en_factura( $address ){
  global $wpo_wcpdf;

  echo $address . '<p>';
  $wpo_wcpdf->custom_field( 'myfld1', 'NIF: ' );
  echo '</p>';
}

function dequeue_devicepx() {
wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );

add_filter( 'wp_login_errors', 'wpse_161709', 10, 2 );

add_filter( 'wp_login_errors', 'wpse_161709', 10, 2 );

/*function https_chrome44fix() {
  $_SERVER['HTTPS'] = false;
}
add_action('init', 'https_chrome44fix',0);*/


function prefix_badgeos_user_achievements_shortcode( $atts = array() ) {
// Parse our attributes
$atts = shortcode_atts( array(
'user' => get_current_user_id(),
'type' => '',
'limit' => 5
), $atts );
$output = '';
// Grab the user's current achievements, without duplicates
$achievements = array_unique( badgeos_get_user_earned_achievement_ids( $atts['user'], $atts['type'] ) );
// Setup a counter
$count = 0;
$output .= '<div class="badgeos-user-badges-wrap">';
// Loop through the achievements
if ( ! empty( $achievements ) ) {
foreach( $achievements as $achievement_id ) {
// If we've hit our limit, quit
if ( $count >= $atts['limit'] ) {
break;
}
// Output our achievement image and title
	$output .= '<div id="badgeos-achievements-list-item-' . $achievement_id . '" class="badgeos-achievements-list-item '. $earned_status . $credly_class .'"'. $credly_ID .'>';

		// Achievement Image
		$output .= '<div class="badgeos-item-image">';
		$output .= '<a href="' . get_permalink( $achievement_id ) . '">' . badgeos_get_achievement_post_thumbnail( $achievement_id ) . '</a>';
		$output .= '</div><!-- .badgeos-item-image -->';

		// Achievement Content
		$output .= '<div class="badgeos-item-description">';

			// Achievement Title
			$output .= '<h2 class="badgeos-item-title"><a href="' . get_permalink( $achievement_id ) . '">' . get_the_title( $achievement_id ) .'</a></h2>';

			// Achievement Short Description
			$output .= '<div class="badgeos-item-excerpt">';
			$output .= badgeos_achievement_points_markup( $achievement_id );
			$excerpt = !empty( $achievement->post_excerpt ) ? $achievement->post_excerpt : $achievement->post_content;
			$output .= wpautop( apply_filters( 'get_the_excerpt', $excerpt ) );
			$output .= '</div><!-- .badgeos-item-excerpt -->';

			// Render our Steps
			if ( $steps = badgeos_get_required_achievements_for_achievement( $achievement_id ) ) {

			}

		$output .= '</div><!-- .badgeos-item-description -->';

	$output .= '</div><!-- .badgeos-achievements-list-item -->';

// Increase our counter
$count++;
}
}
$output .= '</div>';
return $output;
}
add_shortcode( 'custom_badgeos_user_achievements', 'prefix_badgeos_user_achievements_shortcode' );




function wpse_161709( $errors, $redirect_to )
{
   if( isset( $errors->errors['registered'] ) )
   {
     // Use the magic __get method to retrieve the errors array:
     $tmp = $errors->errors;

     // What text to modify:
     $old = 'Registration complete. Please check your e-mail.';
     $new = 'Your new message';

     // Loop through the errors messages and modify the corresponding message:
     foreach( $tmp['registered'] as $index => $msg )
     {
       if( $msg === $old )
           $tmp['registered'][$index] = $new;
     }
     // Use the magic __set method to override the errors property:
     $errors->errors = $tmp;

     // Cleanup:
     unset( $tmp );
   }
   return $errors;
}



function prueba_profesores( $atts = array() ) {
$atts = shortcode_atts( array(
prueba_profesorecs => '',
), $atts );
global $tipoprodf;
$tipoprodf =  $atts['prueba_profesorecs'];
}
add_shortcode( 'profesor_tipo_prueba', 'prueba_profesores' );


add_shortcode( 'exclusivo', 'contenido_registrados' );
function contenido_registrados( $atts, $content = null ) {
        if( is_user_logged_in() ) return '<p>' . $content . '</p>';
        else return;
}
add_shortcode( 'noexclusivo', 'nocontenido_registrados' );
function nocontenido_registrados( $atts, $content = null ) {
        if( !is_user_logged_in() ) return '<p>' . $content . '</p>';
        else return;
}


function my_new_customer_data($new_customer_data){
    $new_customer_data['role'] = 'subscriber';
    return $new_customer_data;
}
add_filter( 'woocommerce_new_customer_data', 'my_new_customer_data');

function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/img/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('admin_head', 'add_favicon');

/**
 * If badgeos select2 is enqueued, remove it, as it causes conflicts.
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function fix_badgeos_bug_for_gathercontent( $data ) {
	// BadgeOS is a bad citizen as it is enqueueing its (old) version of select2 in the entire admin.
	// It is incompatible with the new version, so we need to remove it on our pages.
	if ( wp_script_is( 'badgeos-select2', 'enqueued' ) ) {
		wp_dequeue_script( 'badgeos-select2' );
		wp_deregister_script( 'badgeos-select2' );
		wp_dequeue_style( 'badgeos-select2-css' );
		wp_deregister_style( 'badgeos-select2-css' );
	}
	return $data;
}
add_filter( 'wp_print_scripts', 'fix_badgeos_bug_for_gathercontent' );
