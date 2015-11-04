<header id="masthead" class="site-header site-branding" role="banner">
    <div class="container">
        <div class="row">
            <div id="header-widgets-1" class="col-md-4">
                <?php
                    if ( ! dynamic_sidebar( 'header-widgets-1' ) ) :
                        do_action( 'wpbss-header-widgets-1' );
                    endif; // end sidebar widget area
                ?>
            </div>
            <div id="header-widgets-2" class="col-md-4">
                <?php
                    if ( ! dynamic_sidebar( 'header-widgets-2' ) ) :
                        do_action( 'wpbss-header-widgets-2' );
                    endif; // end sidebar widget area
                ?>
            </div>
            <div id="header-widgets-3" class="col-md-4">
                <?php
                    if ( ! dynamic_sidebar( 'header-widgets-3' ) ) :
                        do_action( 'wpbss-header-widgets-3' );
                    endif; // end sidebar widget area
                ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</header><!-- #masthead -->
