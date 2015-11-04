<?php


//Add CSS option on customizer
function wpbss_customizer_css($wp_customize){

    //###########################################################
    //Add section
    $wp_customize->add_section(
  		'css',
    		array(
    			'title'     => 'CSS',
    			'priority'  => 100,
    			'description' => 'Тонкая настройка стилей сайта'
        )
      );

    $wp_customize->add_setting(
      'css-wpbss',
      array(
          'default' => '',
          'capability' => 'edit_theme_options',
      )
    );

    $wp_customize->add_control(
      'css-wpbss',
      array(
        'section'  => 'css',
        'label'    => 'CSS',
        'type'     => 'textarea'
      )
    );

} add_action( 'customize_register', 'wpbss_customizer_css' );

//Add CSS on head site
function wpbss_css_print() {
  $html = get_theme_mod( 'css-wpbss' );
  if($html) {
    ?>
      <style type="text/css" id="custom-theme-wpbss-css">
        <?php echo $html ; ?>
      </style>
    <?php
  }
} add_action( 'wp_head', 'wpbss_css_print');
