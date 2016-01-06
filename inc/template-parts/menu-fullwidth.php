
<div id="site-navigation">
    <nav class="navbar navbar-static-top primary-menu" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-main-menu">
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
                    'container_class'   => 'collapse navbar-collapse navbar-collapse-main-menu',
                    'menu_class'        => 'nav navbar-nav',
                    'echo'            => true,
                    'fallback_cb'       => 'wpbss_main_menu_fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
        </div>	<!-- .container -->
    </nav>
</div><!-- #site-navigation -->
