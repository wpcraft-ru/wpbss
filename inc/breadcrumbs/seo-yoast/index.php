<?php

/**
 * Add support Breadcrumbs Yoast SEO for WPBSS
 */
class WPBSS_YoastSEO
{
  private $panel_key = 'header_site';
  private $section_key = 'support_yoast_bc_section';
  private $setting_enable_key = 'support_yoast_bc_enable';
  private $priority = 55;


  function __construct()
  {

    if(get_theme_mod( 'section_yoast_bc_priority' )){
      $this->priority = get_theme_mod( 'section_yoast_bc_priority' );
    }

    add_action( $tag = 'header_add_section', array($this, 'add_section'), $this->priority, $accepted_args = 1 );

    add_action( 'customize_register', array($this, 'wpbss_customizer'));


  }

  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){
      //Новая секция
      $wp_customize->add_section(
    		$this->section_key,
      		array(
      			'title'     => 'Поддержка Yoast Breadcrumbs',
            'panel'     => $this->panel_key,
      			'priority'  => 100,
      			'description' => 'Настройки Yoast Breadcrumbs'
          )
        );

      //Опция включения
      $wp_customize->add_setting(
        $this->setting_enable_key,
        array(
            'default' => false,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        $this->setting_enable_key . '_control',
        array(
          'type' => 'checkbox',
          'priority' => 10, // Within the section.
          'section' => $this->section_key, // Required, core or custom.
          'label' => __( 'Включить' ),
          'settings'     => $this->setting_enable_key
        )
      );


      //Опция включения
      $wp_customize->add_setting(
        'section_yoast_bc_priority',
        array(
            'default' => $this->priority,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        'section_yoast_bc_priority_control',
        array(
          'type' => 'number',
          'priority' => 10, // Within the section.
          'section' => $this->section_key, // Required, core or custom.
          'label' => __( 'Приоритет вывода' ),
          'settings'     => 'section_yoast_bc_priority'
        )
      );

  }

  function add_section() {

    if(!get_theme_mod( 'support_yoast_bc_enable' )) return;
    if ( function_exists('yoast_breadcrumb') ) {
      ?>
      <div class="container">
        <div class="breadcrumb">
          <?php yoast_breadcrumb('<div id="breadcrumbs">','</div>'); ?>
        </div>
      </div>
      <?php
    }

  }

}
if(function_exists('yoast_breadcrumb')){
  $TheWPBSS_YoastSEO = new WPBSS_YoastSEO;
}
