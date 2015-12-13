<?php
/**
Template Name: WooCommerce Store
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wpbss
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-8 pull-right">
			<main id="main" class="site-main" role="main">
	
	            <?php woocommerce_content(); ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
