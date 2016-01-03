<?php
/**
 * Template part for displaying single posts.
 *
 * @package wpbss
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' )); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbss' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wpbss_entry_footer(); ?>
        <div class="entry-meta">
			<?php wpbss_posted_on(); ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

