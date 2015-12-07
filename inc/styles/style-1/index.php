<?php

class wpbss_style_1 {

  private $section_key = 'wpbss_style_1';
  private $setting_enable_key = 'wpbss_style_1_enable';


  function __construct() {
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'wp_enqueue_scripts', array($this, 'load_ss' ));

  }




  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){

    //Новая секция
    $wp_customize->add_section(
  		$this->section_key,
    		array(
    			'title'     => 'Набор стилей 1',
    			'priority'  => 100,
    			'description' => 'Набор стилей №1, содержит улучшения для блога'
        )
      );



    //Опция включения
    $wp_customize->add_setting(
      $this->setting_enable_key,
      array(
          'default' => false,
          'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control(
      $this->setting_enable_key . '_control',
      array(
        'type' => 'checkbox',
        'priority' => 10, // Within the section.
        'section' => $this->section_key, // Required, core or custom.
        'label' => __( 'Включить набор стилей №1' ),
        'settings'     => $this->setting_enable_key

    ));

  }

  //Load style and script
  function load_ss() {
    //Если опция включена, то загрузить стиль
    if(get_theme_mod($this->setting_enable_key )){
      wp_enqueue_style( 'wpbbss-style-1', get_template_directory_uri() . '/inc/styles/style-1/style.css' );
    }
    //wp_enqueue_style( 'wpbbss-style-1', get_template_directory_uri() . '/inc/styles/style-1/style.css' );
  }


} $the_wpbss_style_1 = new wpbss_style_1;
