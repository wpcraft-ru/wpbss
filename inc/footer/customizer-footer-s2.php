<?php
/*

Footer section #2

*/


class footer_section_2_class {
  function __construct() {
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'footer_section_add', array($this,'footer_add_section'));
    add_action( 'add_style_options', array($this, 'wpbss_print_style'));
    add_action( 'widgets_init', array($this, 'wpbss_register_sidebar'), 20 );


  }



  /*###############################
  Sidebars register
  */
  function wpbss_register_sidebar(){

    register_sidebar(array(
      'name' => __('Footer S2'),
      'id' => 'footer-s2',
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));

  }




  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){

      //Новая секция
      $wp_customize->add_section(
    		'footer_section_2',
      		array(
      			'title'     => 'Секция 2',
            'panel'     => 'footer_site',
      			'priority'  => 100,
      			'description' => 'Параметры 2 секции подвала'
          )
        );

      //Опция включения
      $wp_customize->add_setting(
        'footer_section_2_enable',
        array(
            'default' => false,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        'footer_section_2_enable_control',
        array(
          'type' => 'checkbox',
          'priority' => 10, // Within the section.
          'section' => 'footer_section_2', // Required, core or custom.
          'label' => __( 'Включить секцию' ),
          'settings'     => 'footer_section_2_enable'

        )
      );

      //Цвет фона
      $wp_customize->add_setting(
        'footer_section_2_bg_color',
        array(
            'default' => get_theme_mod( 'default_color' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_2_bg_color_control',
              array(
                  'section'  => 'footer_section_2',
                  'label'    => 'Основной цвет',
                  'settings'     => 'footer_section_2_bg_color'
              )
          )
      );

      //Цвет текста
      $wp_customize->add_setting(
        'footer_section_2_color',
        array(
            'default' => get_theme_mod( 'default_color_text' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_2_color_control',
              array(
                  'section'  => 'footer_section_2',
                  'label'    => 'Основной цвет элементов',
                  'settings'     => 'footer_section_2_color'
              )
          )
      );

  }

  //Вывод стилей для перовй секции подвала
  function wpbss_print_style() {
      ?>
        #footer-s2 {
          padding: 10px;
          background-color: <?php echo get_theme_mod( 'footer_section_2_bg_color' ) ?>;
          color: <?php echo get_theme_mod( 'footer_section_2_color' ) ?>;
        }
      <?php
  }

  function footer_add_section(){

    if(get_theme_mod( 'footer_section_2_enable')):
      ?>
        <div id="footer-s2">
          <div class="container">
            <?php
                if ( ! dynamic_sidebar( 'footer-s2' ) ) :
                    do_action( 'wpbss-footer-s2' );
                endif; // end sidebar widget area
            ?>
          </div><!-- .container -->
        </div>
      <?php
    endif;
  }


} $the_footer_section_2_class = new footer_section_2_class;
