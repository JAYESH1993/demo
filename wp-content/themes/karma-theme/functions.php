<?php
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'demo23digital_setup' ) ) :
function demo23digital_setup() {	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	register_nav_menus( array(
		'header_menu'       => __( 'Header Menu', 'demo23digital' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_editor_style( array( 'css/editor-style.css', demo23digital_fonts_url() ) );
}
endif; 
add_action( 'after_setup_theme', 'demo23digital_setup' );

function demo23digital_widgets_init() {
	
        register_sidebar( array(
		'name'          => __( 'Blog Categories Sidebar', 'demotheme' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'demotheme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="blog-notitle">',
		'after_title'   => '</h2>',
	) );
        register_sidebar( array(
		'name'          => __( 'Tags Sidebar', 'demotheme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'demotheme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="blog-notitle">',
		'after_title'   => '</h2>',
	) );
        
}
add_action( 'widgets_init', 'demo23digital_widgets_init' );

if ( ! function_exists( 'demo23digital_fonts_url' ) ) :
function demo23digital_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';	
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'demo23digital' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'demo23digital' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'demo23digital' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
function my_deregister_scripts(){
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';


function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
