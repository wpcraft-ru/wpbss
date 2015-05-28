<?php
/**
Template Name: Page. No title

 *
 * @package Maremo
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'maremo' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->
                    
                </article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
