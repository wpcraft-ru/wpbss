<?php
/**
 * Template part for displaying posts.
 *
 * @package wpbss
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if( has_post_thumbnail() ): ?>
		        <a href="<?php the_permalink() ?>">
		        	<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' )); ?>
		        </a>
	        <?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            if ( is_single() ) {
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpbss' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            } else {
	               the_excerpt();
            }
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbss' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wpbss_entry_footer(); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wpbss_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
