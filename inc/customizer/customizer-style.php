<?php

class wpbss_style_customizer {

  private $section_key = 'colors';


  function __construct() {

    //определение параметра первичного цвета
    add_action( 'customize_register', array($this, 'customizer_first_color_bg'));
    add_action( 'customize_register', array($this, 'customizer_first_color_bg_hover'));
    add_action( 'customize_register', array($this, 'customizer_first_color'));

    add_action( 'customize_register', array($this, 'customizer_link_color_hover'));

    //печать стилей
    add_action( 'wp_head', array($this, 'wpbss_print_style' )); // вешаем на wp_head

    //установка параметров в момент активации темы
    add_action( "after_switch_theme", array($this, "wpbss_activation"), 10, 2);

  }



  //установка параметров в момент активации темы, если они пустые 
  function wpbss_activation($oldname, $oldtheme=false) {

    if(! get_theme_mod('first_color_bg'))
      set_theme_mod('first_color_bg', '#f8f8f8');

    if(! get_theme_mod('first_color_bg_hover'))
      set_theme_mod('first_color_bg_hover', '#e7e7e7');

    if(! get_theme_mod('first_color'))
      set_theme_mod('first_color', '#000');

    if(! get_theme_mod('link_color'))
      set_theme_mod('link_color', '#337ab7');

    if(! get_theme_mod('link_color_hover'))
      set_theme_mod('link_color_hover', '#23527c');

  }



  //Опция для  цвета ссылки
  function customizer_customizer_link_color($wp_customize){

      $key = 'link_color';

      //Первый цвет
      $wp_customize->add_setting(
        $key,
        array(
            'default' => $this->link_color,
            'capability' => 'edit_theme_options',
        )
      );

      $wp_customize->add_control(
        new WP_Customize_Color_Control(
              $wp_customize,
              $key . '_control',
              array(
                  'section'  => $this->section_key,
                  'label'    => 'Основной цвет ссылки',
                  'settings' => $key
              )
          )
      );
  }



    //Опция для цвета ссылки при наведении
    function customizer_link_color_hover($wp_customize){

        $key = 'link_color_hover';

        //Первый цвет
        $wp_customize->add_setting(
          $key,
          array(
              'default' => $this->link_color,
              'capability' => 'edit_theme_options',
          )
        );

        $wp_customize->add_control(
          new WP_Customize_Color_Control(
                $wp_customize,
                $key . '_control',
                array(
                    'section'  => $this->section_key,
                    'label'    => 'Основной цвет ссылки при наведении',
                    'settings' => $key
                )
            )
        );
    }



  //Опция для основного цвета элементов
  function customizer_first_color_bg($wp_customize){

      $key = 'first_color_bg';

      //Первый цвет
      $wp_customize->add_setting(
        $key,
        array(
            'default' => $this->first_color_bg,
            'capability' => 'edit_theme_options',
        )
      );

      $wp_customize->add_control(
        new WP_Customize_Color_Control(
              $wp_customize,
              $key . '_control',
              array(
                  'section'  => $this->section_key,
                  'label'    => 'Основной цвет элементов',
                  'settings' => $key
              )
          )
      );
  }




//Опция для основного цвета элементов
function customizer_first_color_bg_hover($wp_customize){

    $key = 'first_color_bg_hover';

    //Первый цвет
    $wp_customize->add_setting(
      $key,
      array(
          'default' => $this->first_color_bg_hover,
          'capability' => 'edit_theme_options',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
            $wp_customize,
            $key . '_control',
            array(
                'section'  => $this->section_key,
                'label'    => 'Основной цвет элементов при наведении',
                'settings' => $key
            )
        )
    );
}



//Опция для основного цвета текста элементов
function customizer_first_color($wp_customize){

    $key = 'first_color';

    //Первый цвет
    $wp_customize->add_setting(
      $key,
      array(
          'default' => $this->first_color,
          'capability' => 'edit_theme_options',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
            $wp_customize,
            $key . '_control',
            array(
                'section'  => $this->section_key,
                'label'    => 'Основной цвет текста элементов',
                'settings' => $key
            )
        )
    );
}

  //Вывод стилей для перовй секции подвала
  function wpbss_print_style() {
    ?>
      <style id="wpbss-style" type="text/css">


        a {
            color: <?php echo get_theme_mod( 'link_color' ) ?>;
        }
        a:hover {
            color: <?php echo get_theme_mod( 'link_color_hover' ) ?>;
        }

        /*
        Default color elements and text color for element
        */
        .btn-default,
        #site-navigation .navbar,
        #site-navigation .dropdown-menu,
        #site-navigation .navbar .navbar-nav>.open>a,
        #site-navigation .nav>li>a:focus,
        #site-navigation a
        {
            background-color: <?php echo get_theme_mod( 'first_color_bg' ) ?>;
            color: <?php echo get_theme_mod( 'first_color' ) ?>;
        }

        .btn-default
        {
            border-color: <?php echo get_theme_mod( 'first_color_bg' ) ?>;
        }


        #site-navigation .navbar .navbar-nav>.open>a:hover,
        #site-navigation .navbar .navbar-nav>.open>a:focus,
        {
            background-color: <?php echo get_theme_mod( 'first_color_bg_hover' ) ?>;
        }

        .btn-default:hover,
        .btn-default:focus,
        .btn-default.focus,
        .btn-default:active,
        .btn-default.active,
        .open>.dropdown-toggle.btn-default,
        #site-navigation .nav>li>a:hover,
        #site-navigation .nav .open>a,
        #site-navigation .nav .open>a:hover,
        #site-navigation .nav .open>a:focus
        {
            background-color: <?php echo get_theme_mod( 'first_color_bg_hover' ) ?>;
            border-color: <?php echo get_theme_mod( 'first_color_bg_hover' ) ?>;
            color: <?php echo get_theme_mod( 'first_color' ) ?>;
        }

        /*
          Кнопка мобильного меню
        */
        #site-navigation .navbar .navbar-toggle .icon-bar {
            background-color: <?php echo get_theme_mod( 'first_color' ) ?>;
        }

        #site-navigation .navbar .navbar-toggle:hover,
        #site-navigation .navbar .navbar-toggle:focus {
            background-color: <?php echo get_theme_mod( 'first_color_bg_hover' ) ?>;
        }


         #site-navigation .navbar-nav a:hover,
         #site-navigation .navbar-nav .active>a {
              background-color: <?php echo  get_theme_mod( 'first_color_bg_hover' ) ?>;
         }
        <?php do_action( 'add_style_options' ); ?>
      </style>
    <?php
  }





} $the_wpbss_style_customizer = new wpbss_style_customizer;
