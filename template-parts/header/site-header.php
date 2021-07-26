<?php
/**
 * Displays the site header.
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

$blog_info  = get_bloginfo( 'name' );
$home_url   = get_home_url();

?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo $home_url ?>">
            <?php the_custom_logo(); ?>
            </a>
        </div>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <?php
        wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'nav navbar-nav',
				'container_class' => 'collapse navbar-collapse',
				'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
        <?php endif; ?>
    </div>
</nav>