<?php
/**
 * Template part for displaying posts
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="row">
			<div class="col-md-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
			<div class="col-md-12 post-img">
				<?php the_post_thumbnail( 'post-thumbnail', ['class' => 'img-responsive'] ); ?>
			</div>
			<div class="col-md-12 post-metas">
				<div class="row">
					<div class="col-md-6">
						<div class="post-author">
							<strong>
								By <?php the_author(); ?>
							</strong>
						</div>
						<div class="post-date">
							<?php the_date( 'M d, Y g:i A' ); ?>
						</div>
					</div>
					<div class="col-md-6 text-right">
        				<div class="post-reading-time">
							<?php the_reading_time(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
