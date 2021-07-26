<?php
/**
 * Theme Custom Styles
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if ( ! function_exists( 'sq1devtest_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function sq1devtest_setup() {
		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'sq1devtest' ),
			)
		);

		/*
		 * Add support for core custom logo.
		 */
		$logo_width  = 110;
		$logo_height = 76;

		add_theme_support(
			'custom-logo',
			array(
				'height' => $logo_height,
				'width'  => $logo_width,
			)
		);
    }
}
add_action( 'after_setup_theme', 'sq1devtest_setup' );

/**
 * Register widget area.
 *
 * @since 1.0
 *
 * @return void
 */
function sq1devtest_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Col 1', 'sq1devtest' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'sq1devtest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Col 2', 'sq1devtest' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'sq1devtest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Col 3', 'sq1devtest' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'sq1devtest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Col 4', 'sq1devtest' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'sq1devtest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sq1devtest_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0
 *
 * @return void
 */
function sq1devtest_scripts() {
	wp_enqueue_style( 'bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'sq1devtest-style', get_template_directory_uri() . '/style.css', array( 'bootstrap-style' ), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );

	wp_enqueue_script( 'sq1devtest-style', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'sq1devtest_scripts' );

/**
 * Default post thumbnail image fallback.
 *
 * @param  string $html The Output HTML of the post thumbnail
 * @param  int $post_id The post ID
 * @param  int $post_thumbnail_id The attachment id of the image
 * @param  string $size The size requested or default
 * @param  mixed string/array $attr Query string or array of attributes
 * @return string $html the Output HTML of the post thumbnail
 */
function default_post_thumbnail( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	if ( empty( $html ) ) {
		return sprintf(
			'<img src="%s" class="%s" />',
			SQ1DEVTEST_TEMPLATE_URL . '/assets/images/default_post_thumbnail.png',
			'img-responsive'
		);
	}
	return $html;
}
add_filter( 'post_thumbnail_html', 'default_post_thumbnail', 20, 5 );

/**
 * Default custom logo fallback.
 *
 * @param  string $html Custom logo HTML output.
 * @return string $html the Output HTML of the custom logo
 */
function default_custom_logo( $html ) {
	if ( empty( $html ) ) {
		return sprintf(
			'<img src="%s" class="%s" />',
			SQ1DEVTEST_TEMPLATE_URL . '/assets/images/logo.png',
			'img-responsive'
		);
	}
	return $html;
}
add_filter( 'get_custom_logo', 'default_custom_logo' );