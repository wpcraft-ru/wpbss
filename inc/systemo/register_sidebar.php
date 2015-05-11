<?php

/*###############################
Регистрируем три сайдбара для шапки, используем в header.php
*/
register_sidebar(array(
	'name' => __('Header 1'),
	'id' => 'header-widget-1',
	'description' => __('Виджеты в шапке 1'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3><a href="#">',
	'after_title' => '</a></h3>',
));
register_sidebar(array(
	'name' => __('Header 2'),
	'id' => 'header-widget-2',
	'description' => __('Виджеты в шапке 2'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3><a href="#">',
	'after_title' => '</a></h3>',
));
register_sidebar(array(
	'name' => __('Header 3'),
	'id' => 'header-widget-3',
	'description' => __('Виджеты в шапке 3'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3><a href="#">',
	'after_title' => '</a></h3>',
));