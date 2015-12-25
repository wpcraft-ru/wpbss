<?php

// Faster than @import and stable http://getbootstrap.com/getting-started/#support-ie8-respondjs
add_action( 'wp_enqueue_scripts', 'wpbss_import_base_style', 22 );
function wpbss_import_base_style() {
    wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
