<?php get_header(); ?>


    <div class="container">
        <div class="row my-5">


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
								<?php the_post_thumbnail('',
									[
										'class'=>'img-fluid img-responsive',
										'title'=>'Post img'
									]);
								?>
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
            <div class="col">
	            <?php
	            echo '<div class="post-pagination">';


	            if(get_previous_posts_link())
	            {
		            previous_posts_link('<i class="fas fa-chevron-left fa-lg"></i> Prev');
	            }else echo '<span class="prev-span">Prev </span>';

	            if(get_next_posts_link())
	            {
		            next_posts_link('Next <i class="fas fa-chevron-right fa-lg"></i>');
	            }else echo '<span class="next-span">Next </span>';

	            echo '</div>';
	            ?>
            </div>
        </div>
    </div>





<?php get_footer() ?>