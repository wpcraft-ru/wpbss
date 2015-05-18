<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Maremo
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
            <div class="row">
                <div id="footer-widgets-1" class="col-md-6">
                    <?php 
                        if ( ! dynamic_sidebar( 'footer-widgets-1' ) ) :
                            do_action( 'wpbss-footer-widgets-1' );
                        endif; // end sidebar widget area
                    ?>
                </div>
                <div id="footer-widgets-2" class="col-md-6">
                    <?php 
                        if ( ! dynamic_sidebar( 'footer-widgets-2' ) ) :
                            do_action( 'wpbss-footer-widgets-2' );
                        endif; // end sidebar widget area
                    ?>        
                </div>
            </div><!-- .row -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
