<?php
/**
 * WMCZ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WMCZ
 */

if ( ! function_exists( 'wmcz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wmcz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WMCZ, use a find and replace
		 * to change 'wmcz-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wmcz-theme', get_template_directory() . '/i18n' );

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
		set_post_thumbnail_size( 300, 300 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wmcz-theme' ),
			'footer-menu' => esc_html__( 'Footer', 'wmcz-theme' )
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wmcz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wmcz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wmcz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wmcz_content_width', 640 );
}
add_action( 'after_setup_theme', 'wmcz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wmcz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wmcz-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wmcz-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wmcz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wmcz_scripts() {
	wp_enqueue_style( 'wmcz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wmcz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wmcz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wmcz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom code for image thumbnail
 */
function wmcz_modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
	if ( !function_exists( 'get_field' ) ) {
		return $html;
	}
	$author = get_field('image_author', $post_thumbnail_id);
	if ($author === null) {
		return $html;
	}
	$license = get_field('image_license', $post_thumbnail_id);
	$source = get_field('image_source', $post_thumbnail_id);
	if ($source !== null) {
		$author = '<a href="' . $source . '">' . $author . '</a>';
	}
	$attribution_line = __('Author', 'wmcz-theme') . ': ' . $author;
	if ($license !== null) {
		$attribution_line .= ', ' . $license;
	}
	$data = wp_get_attachment_image_src($post_thumbnail_id, $size);
	return '<div class="wmcz-post-thumbnail" style="width: ' . $data[1] . 'px">' . wp_get_attachment_image( $post_thumbnail_id, $size, false, $attr ) . '<center class="wmcz-image-attribution">' .$attribution_line . '</center></div>';
}
// add_filter( 'post_thumbnail_html', 'wmcz_modify_post_thumbnail_html', 10, 5 );

function wmcz_image_attributes($attr, $attachment) {
	if ( !function_exists( 'get_field' ) ) {
		return $attr;
	}

	$id = $attachment->ID;

	$author = get_field('image_author', $id);
	if ($author === null) {
		return $attr;
	}

	$license = get_field('image_license', $id);
	$attr['title'] = __('Author', 'wmcz-theme') . ': ' . $author . ', ' . $license;
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'wmcz_image_attributes', 10, 2 );

function wmcz_remove_hellip_from_search( $translation, $text, $context, $domain ) {
	if ( $text == 'Search &hellip;' ) {
		return str_replace( ' &hellip;', '', $translation );
	}
	return $translation;
}
add_filter( 'gettext_with_context', 'wmcz_remove_hellip_from_search', 10, 5 );
