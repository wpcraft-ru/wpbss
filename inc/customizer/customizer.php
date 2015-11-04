<?php
/**
 * Maremo Theme Customizer
 *
 * @package Maremo
 */


include_once 'customizer-logo.php';
include_once 'customizer-contacts.php';
include_once 'customizer-css.php';
include_once 'customizer-footer.php';



/**
 * Set default theme options
 */
function wpbss_activationfunction($oldname, $oldtheme=false) {
    set_theme_mod('default_color', '#f8f8f8');
    set_theme_mod('default_color_on_hover', '#e7e7e7');
    set_theme_mod('default_color_text', '#000');
}
add_action("after_switch_theme", "wpbss_activationfunction", 10 ,  2);

/**
 * Add section for default color
 * @param [[Type]] $wp_customize [[Description]]
 */

function wpbss_customize_default_color_section($wp_customize){


    //###########################################################
    //Add option "Default color"
    $wp_customize->add_setting(
		'default_color',
		array(
			'default'     => '#fff', // по умолчанию - белый
		)
	);

    $wp_customize->add_control(
   		new WP_Customize_Color_Control(
            $wp_customize,
            'default_color_control',
            array(
                'section'  => 'default_color_section',
                'label'    => 'Основной цвет элементов',
                'settings'     => 'default_color'
            )
        )
    );

    //###########################################################
    //Add option "Default color on hover"
    $wp_customize->add_setting(
		'default_color_on_hover',
		array(
			'default'     => '#e7e7e7', // по умолчанию - белый
		)
	);

    $wp_customize->add_control(
   		new WP_Customize_Color_Control(
            $wp_customize,
            'default_color_on_hover_control',
            array(
                'section'  => 'default_color_section',
                'label'    => 'Основной цвет элементов при наведении',
                'settings'     => 'default_color_on_hover'
            )
        )
    );

    //###########################################################
    //Add option "Default color text for element"
    $wp_customize->add_setting(
		'default_color_text',
		array(
			'default'     => '#000', // по умолчанию - черный
		)
	);

    $wp_customize->add_control(
   		new WP_Customize_Color_Control(
            $wp_customize,
            'default_color_text_control',
            array(
                'section'  => 'default_color_section',
                'label'    => 'Основной цвет текста элементов',
                'settings'     => 'default_color_text'
            )
        )
    );

    //###########################################################
    //Add option "Link color"
	$wp_customize->add_setting(
		'link_color', // id
		array(
			'default'     => '#337ab7', // по умолчанию - черный
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color_control', // id
			array(
			    'label'      => 'Цвет ссылок',
			    'section'    => 'default_color_section', // Стандартная секция - Цвета
			    'settings'   => 'link_color' // id
			)
		)
	);

    //###########################################################
    //Add option "Link color on hover"
	$wp_customize->add_setting(
		'link_color_on_hover', // id
		array(
			'default'     => '#337ab7', // по умолчанию - черный
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color_on_hover_control', // id
			array(
			    'label'      => 'Цвет ссылок при наведении',
			    'section'    => 'default_color_section', // Стандартная секция - Цвета
			    'settings'   => 'link_color_on_hover' // id
			)
		)
	);

    //###########################################################
    //Add option "Link color on hover"
	$wp_customize->add_setting(
            'text_color', // id
            array(
                'default'     => '#000000',
            )
	   );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color_control', // id
			array(
			    'label'      => 'Цвет текста',
			    'section'    => 'default_color_section', // Стандартная секция - Цвета
			    'settings'   => 'text_color' // id
			)
		)
	);

    //###########################################################
    //Add section
    $wp_customize->add_section(
		'default_color_section',
		array(
			'title'     => 'Основные цвета',
			'priority'  => 100,
			'description' => 'Выберите основной цвет элементов сайта'
		)
	);

}
add_action( 'customize_register', 'wpbss_customize_default_color_section' );





/**
 * Sanitize text for options theme
 */
function wpbss_sanitize_text_option( $value ) {
	return strip_tags( stripslashes( $value ) );
}

function customizer_css_wpbss() {
    ?>
	   <style id="customize_wpbss">
           /*Commone styles*/
           body {
               color: <?php echo get_theme_mod( 'text_color' ) ?>;
           }

           a {
               color: <?php echo get_theme_mod( 'link_color' ) ?>;
           }
           a:hover {
               color: <?php echo get_theme_mod( 'link_color_on_hover' ) ?>;
           }



           .btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
              background-color: <?php echo  get_theme_mod( 'default_color_on_hover' ) ?>;
              color: <?php echo  get_theme_mod( 'default_color_text' ) ?>;
            }

           /*
           Default color elements and text color for element
           */
          .btn-default,
           .navbar-default,
           #site-navigation .dropdown-menu
           {
               background-color: <?php echo  get_theme_mod( 'default_color' ) ?>;
               color: <?php echo  get_theme_mod( 'default_color_text' ) ?>;
            }

           .navbar-default .navbar-nav>.open>a,
           .navbar-default .navbar-nav>.open>a:hover,
           .navbar-default .navbar-nav>.open>a:focus
           {
                background-color: <?php echo  get_theme_mod( 'default_color' ) ?>;
                color: <?php echo  get_theme_mod( 'default_color_text' ) ?>;
           }

           /*
           Header and main menu
           */
           #site-navigation a {
               color: <?php echo  get_theme_mod( 'default_color_text' ) ?>;
            }



           <?php do_action( 'add_style_options' ); ?>
	   </style>
    <?php
}
add_action( 'wp_head', 'customizer_css_wpbss' ); // вешаем на wp_head
