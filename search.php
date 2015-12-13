<?php
/**
 * The template for displaying search results pages.
 *
 * @package wpbss
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area col-md-8 col-xs-12 pull-right">
			<main id="main" class="site-main" role="main">
	
			<?php if ( have_posts() ) : ?>
	
				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wpbss' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->
	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'inc/template-parts/content', 'search' );
					?>
	
				<?php endwhile; ?>
	
				<?php the_posts_navigation(); ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'inc/template-parts/content', 'none' ); ?>
	
			<?php endif; ?>
	
			</main><!-- #main -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
