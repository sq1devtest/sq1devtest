<?php
/**
 * The template for displaying all single posts
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

get_header();
?>
<div class="col-md-8">
<?php
if ( have_posts() ) {
	/* Start the Loop */
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content-single' );
	}
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );
}
?>
</div>
<div class="col-md-4">

</div>
<?php
get_footer();