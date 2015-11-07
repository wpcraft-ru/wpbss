<?php

//Add panel for settings bottom site
function customizer_header_site_wpbss($wp_customize){

  $wp_customize->add_panel(
    'header_site',
    array(
      'title' => __( 'Шапка' ),
      'description' => __('Параметры верхней части сайта'), // Include html tags such as <p>.
      'priority' => 90, // Mixed with top-level-section hierarchy.
    )
  );
  
} add_action( 'customize_register', 'customizer_header_site_wpbss' );
