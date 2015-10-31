<?php
function wpbss_customizer_logo($wp_customize){

  // изображение в заголовке
  $wp_customize->add_setting(
    'logo',
    array(
      'default'      => '', // по умолчанию - изображение не установлено
      'transport'    => 'refresh'
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo_control',
      array(
        'label'    => 'Логотип',
        'settings' => 'logo',
        'section'  => 'title_tagline'
      )
    )
  );

} add_action( 'customize_register', 'wpbss_customizer_logo' );
