<?php
/**
 * The main template file
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

get_header();
?>

<?php
if ( have_posts() ) {
	/* Start the Loop */
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content' );
	}
} else {
    // If no content, include the "No posts found" template.
    get_template_part( 'template-parts/content/content-none' );
}
?>

<?php get_footer(); ?>