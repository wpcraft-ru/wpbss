<?php


/**
 * Add contacts data for site
 */
function wpbss_customize_contacts( $wp_customize ) {

	$wp_customize->add_section(
    'site_contacts',
    array(
      'title'     => 'Контактные данные',
      'priority'  => 200,
      'description' => 'Настройте основные данные сайта'
      )
   );


   $wp_customize->add_setting(
      'phone',
      array(
          'default'            => '+7 (800) 000 00-00',
          'sanitize_callback'  => 'wpbss_sanitize_text_option',
      )
    );

    $wp_customize->add_control(
			'phone',
			array(
				'section'  => 'site_contacts',
				'label'    => 'Телефон',
				'type'     => 'text'
			)
		);

		$wp_customize->add_setting(
			'email',
			array(
				'default'            => 'admin@example.com',
				'sanitize_callback'  => 'wpbss_sanitize_text_option',
			)
		);
		$wp_customize->add_control(
			'email',
			array(
				'section'  => 'site_contacts',
				'label'    => 'Email',
				'type'     => 'text'
			)
		);


}
add_action( 'customize_register', 'wpbss_customize_contacts' );
