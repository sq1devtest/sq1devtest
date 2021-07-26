<?php
/**
 * Displays the footer widget area.
 *
 */
?>
<div class="col-md-3 widget-area">
    <?php the_custom_logo(); ?>
    <?php get_template_part( 'template-parts/footer/footer-socials' ); ?>
    <p class="footer-copy">Copyright &copy <?php echo date('Y'); ?>. All rights reserved. Developed by <a href="https://www.square1.io/" target="_blank" title="Square1">Square1</a> and powered by <a href="https://www.publisherplus.com/" target="_blank" title="PublisherPlus.com">PublisherPlus.com</a></p>
</div>

<div class="col-md-3 widget-area">
    <?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
        <?php dynamic_sidebar( 'footer-2' ); ?>
    <?php } ?>
</div>

<div class="col-md-3 widget-area">
    <?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
        <?php dynamic_sidebar( 'footer-3' ); ?>
    <?php } ?>
</div>

<div class="col-md-3 widget-area">
    <?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
        <?php dynamic_sidebar( 'footer-4' ); ?>
    <?php } ?>
</div>