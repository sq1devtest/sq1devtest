<?php
/**
 * Template part for displaying posts
 *
 */

?>

<article id="post-<?php the_ID(); ?>" class="col-md-6">
    <div class="post-listing">
        <div class="post-info">
            <a href="<?php the_permalink(); ?>">
                <?php the_title( '<h3 class="post-title">', '</h3>' ); ?>
            </a>
            <div class="post-author">
                By <?php the_author(); ?>
            </div>
        </div>
        <div class="post-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive img-rounded'] ); ?>
            </a>
        </div>
    </div>
</article>