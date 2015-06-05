<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpbss
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
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
    <div id="site-navigation">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'wpbss' ); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'menu_class'        => 'nav navbar-nav',
                        'echo'            => true,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
            </div>	<!-- .container -->
        </nav>
    </div><!-- #site-navigation -->

    <div id="content" class="site-content container">
        <div class="row">