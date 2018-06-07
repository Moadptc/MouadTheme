<?php get_header(); ?>

<?php

$comments_args = array(
	'status' => 'approve'
);

$comments_count = 0;

$all_comments = get_comments($comments_args); // get all comments

$category_name = get_the_category()[0]->name;

foreach ($all_comments as $comment)
{
	$post_id = $comment->comment_post_ID;

	if(! in_category($category_name , $post_id)) // check if post not in Linux category
	{
		continue;  // continue loop
	}

	$comments_count++;
}

$cat = get_queried_object();

$post_count = $cat->count;




?>

	<div class="container home-page">

		<div class="row my-5">
			<div class="container">
				<div class="category-information text-center py-3 my-3 bg-white">
					<div class="row">
						<div class="col-md-4">
							<div class="category-title">
								<h1>
									<?php  single_cat_title();  ?>
								</h1>
							</div>
						</div>
						<div class="col-md-4">
							<div class="category-decription">
								<p>
									<?php echo category_description(); ?>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="cat-satas py-3">
								<span>Articles Count : <?php echo $post_count ?></span>
								<span>Comments Count : <?php echo $comments_count ?></span>
							</div>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>

			<?php
			if ( have_posts() )
			{
				while ( have_posts() )
				{
					the_post();
					?>

					<div class="col-md-6">
						<div class="main-post">
							<h3 class="post-title">
								<a href="<?php the_permalink() ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<span class="post-author mr-2">
                                <i class="fas fa-user fa-fw"></i>
								<?php the_author_posts_link(); ?>
                            </span>
							<span class="post-date mr-2">
                                <i class="fas fa-calendar fa-fw"></i>
								<?php the_time('D m Y'); ?>
                            </span>
							<span class="post-comments mr-2">
                                <i class="fas fa-comments fa-fw"></i>
								<?php comments_popup_link(
									'No Comments',
									'1 Comment',
									'% Comments',
									'comment-url',
									'Comments Disabled'
								); ?>
                        </span>

							<div class="img-post">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('',
										[
											'class'=>'img-fluid img-responsive',
											'title'=>'Post img'
										]);
									?>
								</a>
							</div>
							<div class="post-content">
								<?php the_excerpt(); ?>
							</div>

							<hr>
							<p class="post-categories">
								<i class="fas fa-tags fa-fw"></i>
								<?php the_category(', '); ?>
							</p>
							<p class="post-tags">
								<?php
								if(has_tag())
								{
									the_tags(null , ' | ');
								}else
									echo 'Tags : there\'s No tags';
								?>
							</p>
						</div>
					</div>

					<?php
				}
			}


			?>

		</div>


		<div class="row">
			<div class="col text-center paginate">
				<?php
				/*------------------ next and previous pagination -----------------*/
				/*echo '<div class="post-pagination">';


				if(get_previous_posts_link())
				{
					previous_posts_link('<i class="fas fa-chevron-left fa-lg"></i> Prev');
				}else echo '<span class="prev-span">Prev </span>';

				if(get_next_posts_link())
				{
					next_posts_link('Next <i class="fas fa-chevron-right fa-lg"></i>');
				}else echo '<span class="next-span">Next </span>';

				echo '</div>';*/
				/*------------------ end next and previous pagination -----------------*/

				echo mouad_pagination();
				?>
			</div>
		</div>
	</div>





<?php get_footer() ?>