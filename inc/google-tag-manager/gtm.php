<?php
/**
 * Google Tag Manager Support
 */
class WPBSS_GTM {

  function __construct()
  {
    add_action( 'customize_register', array($this, 'wpbss_customizer') );
    add_action( 'wpbss_start_body', array($this, 'wpbss_gtm_print') );
  }


  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){

      //###########################################################
      //Add section
      $wp_customize->add_section(
    		'wpbss_gtm_section',
      		array(
      			'title'     => 'GTM',
      			'priority'  => 100,
      			'description' => 'Настройка Google Tag Manager'
          )
        );

      $wp_customize->add_setting(
        'wpbss-gtm',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
        )
      );

      $wp_customize->add_control(
        'wpbss-gtm',
        array(
          'section'  => 'wpbss_gtm_section',
          'label'    => 'Введите код GTM',
          'type'     => 'textarea'
        )
      );

  }


  //Add GTM afer open <body>
  function wpbss_gtm_print() {
    $data = get_theme_mod( 'wpbss-gtm' );
    if($data) echo $data;
  }
}
$TheWPBSS_GTM = new WPBSS_GTM;
