<?php



//Add panel for settings bottom site
function customizer_bottom_site_wpbss($wp_customize){

  $wp_customize->add_panel(
    'footer_site',
    array(
      'title' => __( 'Подвал' ),
      'description' => __('Параметры нижней части сайта'), // Include html tags such as <p>.
      'priority' => 100, // Mixed with top-level-section hierarchy.
    )
  );
} add_action( 'customize_register', 'customizer_bottom_site_wpbss' );

include_once 'customizer-footer-s1.php';
include_once 'customizer-footer-s2.php';
include_once 'customizer-footer-s3.php';
