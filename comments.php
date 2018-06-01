<?php

if(comments_open())
{
	echo '<h3>'. comments_number('0 Comment','1 Comment','% Comments') .'</h3>';

	echo '<ul class="list-unstyled comments-list">';

	$comments_args = array(
		'max_depth' => 3,
		'type' => 'comment',
		'avatar_size' => 64
	);

	wp_list_comments($comments_args);

	echo '</ul>';

}else
{
	echo 'comments are closed';
}