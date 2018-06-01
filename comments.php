<?php

if(comments_open())
{
?>

	<h3 class="comment-counts">
		<?php comments_number('0 Comment','1 Comment','% Comments') ?>
	</h3>

<?php
	echo '<ul class="list-unstyled comments-list">';

	$comments_args = array(
		'max_depth' => 3,
		'type' => 'comment',
		'avatar_size' => 64
	);

	wp_list_comments($comments_args);

	echo '</ul>';

	$comment_form = array(
		'fields' => array(
			'author' => '<div class="form-group">
							<label>Your Name </label>
							<input id="author" name="author" size="30"
							 maxlength="245" required="required" class="form-control" type="text">
						</div>',
			'email' => '<div class="form-group">
							<label>Your Email </label>
							<input id="email" name="email" size="30"
							 maxlength="100" aria-describedby="email-notes"
							 required="required" class="form-control" type="text">
						</div>',
			'url' => '<div class="form-group">
							<label>Your Website </label>
							<input id="url" name="url" 
							 size="30" maxlength="200" class="form-control" type="text">
						</div>',
		),
		'comment_field' => '<div class="form-group">
								<label>Comment </label>
								<textarea id="comment" name="comment" cols="45" rows="8" 
								maxlength="65525" required="required" class="form-control"></textarea>
							</div>',
        'title_reply' => 'Write your comment',
        'title_reply_to' => 'Add a Reply To [%s]',
        'comment_notes_before' => ''
	);

	comment_form($comment_form);

}else
{
	echo 'comments are closed';
}