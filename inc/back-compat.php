
<?php
/**
 * Back compat functionality
 *
 * Prevents the theme from running on WordPress versions prior to 5.3.
 *
 * @since 1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/**
 * Display upgrade notice on theme switch.
 *
 * @since 1.0
 *
 * @return void
 */
function sq1devtest_switch_theme() {
	add_action( 'admin_notices', 'sq1devtest_upgrade_notice' );
}
add_action( 'after_switch_theme', 'sq1devtest_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * the theme on WordPress versions prior to 5.3.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function sq1devtest_upgrade_notice() {
	echo '<div class="error"><p>';
	printf(
		/* translators: %s: WordPress Version. */
		esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'sq1devtest' ),
		esc_html( $GLOBALS['wp_version'] )
	);
	echo '</p></div>';
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.3.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function sq1devtest_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress Version. */
			esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'sq1devtest' ),
			esc_html( $GLOBALS['wp_version'] )
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'sq1devtest_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.3.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function sq1devtest_preview() {
	if ( isset( $_GET['preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		wp_die(
			sprintf(
				/* translators: %s: WordPress Version. */
				esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'sq1devtest' ),
				esc_html( $GLOBALS['wp_version'] )
			)
		);
	}
}
add_action( 'template_redirect', 'sq1devtest_preview' );
