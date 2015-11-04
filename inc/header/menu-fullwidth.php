<?php

function header_add_menu_fullwidth(){

	get_template_part( 'inc/template-parts/menu', 'fullwidth' );

} add_action( 'header_add_section', 'header_add_menu_fullwidth', $priority = 20  );
