<?php
/**
 * Functions and definitions
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/*
 * Define Constants
 */
define( 'SQ1DEVTEST_TEMPLATE_PATH', get_template_directory() );
define( 'SQ1DEVTEST_TEMPLATE_URL', get_template_directory_uri() );


/*
 * Import Files
 */
require SQ1DEVTEST_TEMPLATE_PATH . '/inc/theme-setup.php';
require SQ1DEVTEST_TEMPLATE_PATH . '/inc/reading-time.php';
require SQ1DEVTEST_TEMPLATE_PATH . '/inc/posts-sync.php';