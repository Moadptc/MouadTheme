<?php

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
		get_template_directory_uri().'/js/bootstrap.min.js',
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

