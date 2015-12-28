<?php

/*###############################
Register 3 sidebars for header.php
*/

function wpbss_widgets_h3_init() {

	register_sidebar(array(
		'name' => __('Header 1'),
		'id' => 'header-widgets-1',
		'description' => __('Header Widgets 1'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Header 2'),
		'id' => 'header-widgets-2',
		'description' => __('Header Widgets 2'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Header 3'),
		'id' => 'header-widgets-3',
		'description' => __('Header Widgets 3'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'wpbss_widgets_h3_init', 20 );


function header_add_tmpl_3widgets(){

	get_template_part( 'inc/template-parts/header', '3widgets' );

} add_action( 'header_add_section', 'header_add_tmpl_3widgets', $priority = 20 );




/**
 * Add block for header if no widgets 1
 */
function wpbss_header_widgets_1_callback(){
    if ( get_theme_mod('logo')) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_theme_mod('logo'); ?>"  class="img-responsive" alt="" />
        </a>
    <?php else: // End header image check. ?>
       <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
       <strong class="site-description"><?php bloginfo( 'description' ); ?></strong>
    <?php endif; // End header image check.
}
add_action( 'wpbss-header-widgets-1', 'wpbss_header_widgets_1_callback' );
