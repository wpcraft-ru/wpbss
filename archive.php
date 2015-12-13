<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbss
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-8 col-xs-12 pull-right">
			<main id="main" class="site-main" role="main">
	
			<?php if ( have_posts() ) : ?>
	
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'inc/template-parts/content', get_post_format() );
					?>
	
				<?php endwhile; ?>
	
				<?php the_posts_pagination(array(
					'mid_size'	=> 3,
					//'type'			=> 'list',
				)); ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'inc/template-parts/content', 'none' ); ?>
	
			<?php endif; ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
