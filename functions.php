<?php


require 'bootstrap-navwalker.php';

/*
 *  add styles
 */

function mouad_add_styles()
{
	wp_enqueue_style('bt4',get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('fas',get_template_directory_uri().'/css/fontawesome.css');
	wp_enqueue_style('main',get_template_directory_uri().'/css/main.css');
}

/*
 *  add scripts
 */

function mouad_add_scripts()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery' , includes_url('/js/jquery/jquery.js'),
		false , '' , true);

	wp_enqueue_script('jquery');

	wp_enqueue_script('bt4',
		get_template_directory_uri().'/js/bootstrap.js',
		array(), false, true );

	wp_enqueue_script('popper',
		get_template_directory_uri().'/js/popper.min.js',
		array(), false, true );

	wp_enqueue_script('main-js',
		get_template_directory_uri().'/js/main.js',
		array(), false, true );

	/*------   fucking microsoft IE  ----------*/

	wp_enqueue_script('html5shiv',get_template_directory_uri().'/js/html5shiv.min.js');
	wp_enqueue_script('respond',get_template_directory_uri().'/js/respond.min.js');

	wp_script_add_data('html5shiv' , 'conditional' , 'lt IE 9');
	wp_script_add_data('respond' , 'conditional' , 'lt IE 9');

	/*------   fucking microsoft IE  ----------*/
}

// hooks all scripts or put all scripts and styles in index.php

add_action('wp_enqueue_scripts','mouad_add_styles');
add_action('wp_enqueue_scripts','mouad_add_scripts');


/*
 *  custom menu
 */

function mouad_register_costum_menu()
{
	register_nav_menus(
		array(
			'bt4-menu' => 'Navigation Bar',
			'footer-menu' => 'Footer Menu'
		)
	);
}

function mouad_put_menu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'bt4-menu',
			'menu_class' => 'navbar-nav ml-auto',
			'menu_id'        => 'primary-menu',
			'container'      => false,
			'depth'          => 2,
			'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
			'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback

		)
	);
}

add_action('init','mouad_register_costum_menu');


