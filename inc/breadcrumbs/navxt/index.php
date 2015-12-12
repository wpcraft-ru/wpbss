<?php

/**
 * Add Breadcrumbs Navxt to WPBSS
 */
class WPBSS_NavXT
{
  private $panel_key = 'header_site';
  private $section_key = 'suport_navxt_section';
  private $setting_enable_key = 'suport_navxt_enable';


  function __construct()
  {
    add_action( $tag = 'header_add_section', array($this, 'wpbss_add_navxt'), $priority = 555, $accepted_args = 1 );

    add_action( 'customize_register', array($this, 'wpbss_customizer'));

  }

  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){
      //Новая секция
      $wp_customize->add_section(
    		$this->section_key,
      		array(
      			'title'     => 'Поддержка BC NavXT',
            'panel'     => $this->panel_key,
      			'priority'  => 100,
      			'description' => 'Настройки NavXT Breadcrumbs'
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


  }

  function wpbss_add_navxt() {

    if(!get_theme_mod( 'suport_navxt_enable' )) return;
    ?>
    <div class="container">
      <div class="breadcrumbs breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
      </div>
    </div>
  <?php
  }

}
if(function_exists('bcn_display')){
  $TheWPBSS_NavXT = new WPBSS_NavXT;
}
