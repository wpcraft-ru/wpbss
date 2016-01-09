<?php

class header_top_bar_wpbss {

  private $section_key = 'header_section_topbar';
  private $panel_key = 'header_site';
  private $setting_enable_key = 'header_section_topbar_enable';
  private $setting_bg_color = 'header_section_1_bg_color';
  private $setting_color = 'header_section_1_color';


  function __construct() {
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'header_add_section', array($this, 'header_add_topbar'), $priority = 10  );
    add_action( 'wp_head', array($this, 'wpbss_print_style' )); // вешаем на wp_head
    add_action( 'after_setup_theme', array($this, 'add_menu' ));

  }



  function add_menu(){
    register_nav_menus(array(
      'menu-top' => __( 'Верхнее меню', 'wpbss' ),
    ));
  }


  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){



      //Новая секция
      $wp_customize->add_section(
    		$this->section_key,
      		array(
      			'title'     => 'Верхняя панель',
            'panel'     => $this->panel_key,
      			'priority'  => 100,
      			'description' => 'Параметры 1 секции подвала'
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
          'label' => __( 'Включить верхнюю панель' ),
          'settings'     => $this->setting_enable_key

        )
      );



      //Цвет фона
      $wp_customize->add_setting(
        $this->setting_bg_color,
        array(
            'default' => get_theme_mod( 'default_color' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              $this->setting_bg_color . '_control',
              array(
                  'section'  => $this->section_key,
                  'label'    => 'Основной цвет',
                  'settings' => $this->setting_bg_color
              )
          )
      );



      //Цвет текста
      $wp_customize->add_setting(
        $this->setting_color,
        array(
            'default' => get_theme_mod( 'default_color_text' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              $this->setting_color . '_control',
              array(
                  'section'  => $this->section_key,
                  'label'    => 'Основной цвет элементов',
                  'settings'     => $this->setting_color
              )
          )
      );

  }

  //Вывод стилей для перовй секции подвала
  function wpbss_print_style() {
    if(get_theme_mod( $this->setting_enable_key )):

      ?>
      <style id="topbar-wpbss" type="text/css">
        #topbar-s1 {
            background-color: <?php echo get_theme_mod( $this->setting_bg_color ); ?>;
            color: <?php echo get_theme_mod( $this->setting_color ); ?>;
        }

        #topbar-s1 .navbar-nav>li>a {
            padding-top: 5px;
            padding-bottom: 5px;
        }
      </style>
      <?php

    endif;

  }

  function header_add_topbar(){

    if(get_theme_mod( $this->setting_enable_key )):
      ?>
        <div id="topbar-s1">
          <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                    <span class="sr-only"><?php esc_html_e( 'Toggle top navigation', 'wpbss' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'menu-top',
                    'menu_id'           => 'top-menu-wpbss',
                    'depth'             => 2,
                    'container'         => 'nav',
                    'container_class'   => 'collapse navbar-collapse navbar-collapse-top',
                    'menu_class'        => 'nav navbar-nav',
                    'echo'              => true,
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
          </div>

        </div>
      <?php
    endif;
  }

} $the_header_top_bar_wpbss = new header_top_bar_wpbss;
