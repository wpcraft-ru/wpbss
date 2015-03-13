<?php
/**
 * Maremo Theme Customizer
 *
 * @package Maremo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function maremo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Цвета ссылок
	$wp_customize->add_setting(
		'true_link_color', // id
		array(
			'default'     => '#000000', // по умолчанию - черный
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'true_link_color', // id
			array(
			    'label'      => 'Цвет ссылок',
			    'section'    => 'colors', // Стандартная секция - Цвета
			    'settings'   => 'true_link_color' // id
			)
		)
	);


	$wp_customize->add_setting(
		'true_text_color', // id
		array(
			'default'     => '#000000', // по умолчанию - черный
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'true_text_color', // id
			array(
			    'label'      => 'Цвет текста',
			    'section'    => 'colors', // Стандартная секция - Цвета
			    'settings'   => 'true_text_color' // id
			)
		)
	);


	$wp_customize->add_setting(
		'true_akcent_color', // id
		array(
			'default'     => '#000000', // по умолчанию - черный
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'true_akcent_color', // id
			array(
			    'label'      => 'Акцент',
			    'section'    => 'colors', // Стандартная секция - Цвета
			    'settings'   => 'true_akcent_color' // id
			)
		)
	);


	$wp_customize->add_section(
		'true_display_options',
		array(
			'title'     => 'Контакты',
			'priority'  => 200,
			'description' => 'Настройте контакты вашего сайта'
		)
	);
			$wp_customize->add_setting(
				'phone_header',
				array(
					'default'            => '+7 (987) 654 32-10',
					'sanitize_callback'  => 'true_sanitize_copyright',
					'transport'          => 'postMessage'
				)
			);
			$wp_customize->add_control(
				'phone_header',
				array(
					'section'  => 'true_display_options',
					'label'    => 'Телефон',
					'type'     => 'text'
				)
			);

			$wp_customize->add_setting(
				'email_header',
				array(
					'default'            => 'admin@example.com',
					'sanitize_callback'  => 'true_sanitize_copyright',
					'transport'          => 'postMessage'
				)
			);
			$wp_customize->add_control(
				'email_header',
				array(
					'section'  => 'true_display_options',
					'label'    => 'Email',
					'type'     => 'text'
				)
			);

		$wp_customize->add_section(
		'1_section_of_indexpage',
		array(
			'title'     => 'Cекции главной страницы',
			'priority'  => 200,
			'description' => 'Настройте секции главной страницы вашего сайта'
		)
	);
			$wp_customize->add_setting(
				'zagolovok1_index',
				array(
					'default'            => 'Например Техническое обслуживание и ремонт авто',
					'sanitize_callback'  => 'true_sanitize_copyright',
					'transport'          => 'postMessage'
				)
			);
			$wp_customize->add_control(
				'zagolovok1_index',
				array(
					'section'  => '1_section_of_indexpage',
					'label'    => 'Заголовок первой секции',
					'type'     => 'text'
				)
			);

			// изображение в заголовке
			$wp_customize->add_setting(
				'true_image',
				array(
					'default'      => '', // по умолчанию - изображение не установлено
					'transport'    => 'refresh'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'true_image',
					array(
						'label'    => 'Изображение',
						'settings' => 'true_image',
						'section'  => '1_section_of_indexpage'
					)
				)
			);
}
add_action( 'customize_register', 'maremo_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maremo_customize_preview_js() {
	wp_enqueue_script( 'maremo_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'maremo_customize_preview_js' );

function true_sanitize_copyright( $value ) {
	return strip_tags( stripslashes( $value ) );
}

function true_customizer_css() {
	echo '<style>';
	echo 'body { color: ' . get_theme_mod( 'true_text_color' ) . '; }';
	echo 'a { color: ' . get_theme_mod( 'true_link_color' ) . '; }';
	echo '.akcent { background-color: ' . get_theme_mod( 'true_akcent_color' ) . '; }';
	echo '.akcentf { color: ' . get_theme_mod( 'true_text_color' ) . '; }';
	echo '</style>';
}
add_action( 'wp_head', 'true_customizer_css' ); // вешаем на wp_head