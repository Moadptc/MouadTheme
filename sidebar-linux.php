<?php

$comments_args = array(
	'status' => 'approve'
);

$comments_count = 0;

$all_comments = get_comments($comments_args); // get all comments

foreach ($all_comments as $comment)
{
	$post_id = $comment->comment_post_ID;

	if(! in_category('linux' , $post_id)) // check if post not in Linux category
	{
		continue;  // continue loop
	}

	$comments_count++;
}

$cat = get_queried_object();

$post_count = $cat->count;


?>

<div class="sidebar-linux">

	<div class="widget">
		<h3 class="widget-title">
			<?php single_cat_title() ?> Statistics
		</h3>
		<div class="widget-content">
			<ul>
				<li>
					<span>Comments Count</span>:
					<?php echo $comments_count ?>
				</li>
				<li>
					<span>Articles Count</span>:
					<?php echo $post_count ?>
				</li>
			</ul>
		</div>
	</div>

	<div class="widget">
		<h3 class="widget-title">
			Search
		</h3>
		<div class="widget-content">
			<ul>
				<li>
					<?php get_search_form(); ?>
				</li>
			</ul>
		</div>
	</div>

	<div class="widget">
		<h3 class="widget-title">Latest PHP Posts</h3>
		<div class="widget-content">
			<ul>
			<?php

			$posts_args = array(
				'posts_per_page' => 5,
				'cat' => 8,
			);

			$query = new WP_Query($posts_args);

			if($query->have_posts())
			:
				while ($query->have_posts())
				:
					$query->the_post();
			?>


			<li>
				<a href="<?php the_permalink() ?>">
					<?php the_title(); ?>
				</a>
			</li>


			<?php

				endwhile;
				wp_reset_postdata();
			endif;


			?>
			</ul>
		</div>
	</div>

	<div class="widget">
		<h3 class="widget-title">Hot Posts by Comments</h3>
		<div class="widget-content">
			<ul>
				<?php

				$hotpost_args = array(
					'posts_per_page' => 3,
					'orderby' => 'comment_count'
				);

				$hotquery = new WP_Query($hotpost_args);

				if($hotquery->have_posts())
					:
					while ($hotquery->have_posts())
						:
						$hotquery->the_post();
						?>


						<li>
							<a href="<?php the_permalink() ?>">
								<?php the_title(); ?>
							</a>
							(<?php

								comments_popup_link(
								'No Comments',
								'1 Comment',
								'%',
								'comment-url',
								'Comments Disabled'
							);
							?>)
						</li>


						<?php

					endwhile;
					wp_reset_postdata();
				endif;


				?>
			</ul>
		</div>
	</div>

</div>