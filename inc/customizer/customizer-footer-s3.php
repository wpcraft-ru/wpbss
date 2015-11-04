<?php

class footer_section_3_class {
  function __construct() {
    add_action( 'add_style_options', array($this, 'wpbss_print_style'));
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'footer_section_add', array($this,'footer_add_section'));



		/*###############################
		Sidebars for section
		*/
		register_sidebar(array(
			'name' => __('Footer S3P1'),
			'id' => 'footer-s3-p1',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Footer S3P2'),
			'id' => 'footer-s3-p2',
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
    		'footer_section_3',
      		array(
      			'title'     => 'Секция 3',
            'panel'     => 'footer_site',
      			'priority'  => 300,
      			'description' => 'Параметры 3 секции подвала'
          )
        );

      //Опция включения
      $wp_customize->add_setting(
        'footer_section_3_enable',
        array(
            'default' => true,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        'footer_section_3_enable_control',
        array(
          'type' => 'checkbox',
          'priority' => 10, // Within the section.
          'section' => 'footer_section_3', // Required, core or custom.
          'label' => __( 'Включить секцию' ),
          'settings'     => 'footer_section_3_enable'

        )
      );

      //Цвет фона
      $wp_customize->add_setting(
        'footer_section_3_bg_color',
        array(
            'default' => get_theme_mod( 'default_color' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_3_bg_color_control',
              array(
                  'section'  => 'footer_section_3',
                  'label'    => 'Основной цвет элементов',
                  'settings'     => 'footer_section_3_bg_color'
              )
          )
      );

      //Цвет текста
      $wp_customize->add_setting(
        'footer_section_3_color',
        array(
            'default' => get_theme_mod( 'default_color_text' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_3_color_control',
              array(
                  'section'  => 'footer_section_3',
                  'label'    => 'Основной цвет элементов',
                  'settings'     => 'footer_section_3_color'
              )
          )
      );

  }

  //Вывод стилей для данной секции подвала
  function wpbss_print_style() {
      ?>
        #footer-s3 {
          padding: 10px;
          background-color: <?php echo get_theme_mod( 'footer_section_3_bg_color' ); ?>;
          color: <?php echo get_theme_mod( 'footer_section_3_color' ); ?>;
        }
      <?php
  }

	function footer_add_section(){
		if(get_theme_mod( 'footer_section_3_enable')):

			?>
			<div id="footer-s3">
				<div class="container">
		      <div class="row">
		          <div id="footer-widgets-1" class="col-md-6">
		              <?php
		                  if ( ! dynamic_sidebar( 'footer-s3-p1' ) ) :
		                      do_action( 'wpbss-footer-s3-p1' );
		                  endif; // end sidebar widget area
		              ?>
		          </div>
		          <div id="footer-widgets-2" class="col-md-6">
		              <?php
		                  if ( ! dynamic_sidebar( 'footer-s3-p2' ) ) :
		                      do_action( 'wpbss-footer-s3-p2' );
		                  endif; // end sidebar widget area
		              ?>
		          </div>
		      </div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .site-info -->
			<?php

		endif;
	}


} $the_footer_section_3_class = new footer_section_3_class;
