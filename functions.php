<?php

if( file_exists(get_template_directory().'/inc/enqueue.php')){
	require_once( get_template_directory().'/inc/enqueue.php');
}

if( file_exists(get_template_directory().'/inc/theme-setup.php')){
	require_once( get_template_directory().'/inc/theme-setup.php');
}

if( file_exists(get_template_directory().'/inc/custom-widget.php')){
	require_once( get_template_directory().'/inc/custom-widget.php');
}


if( file_exists(get_template_directory().'/inc/menu.php')){
	require_once( get_template_directory().'/inc/menu.php');
}