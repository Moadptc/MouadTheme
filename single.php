<?php get_header(); ?>


	<div class="container post-page">
		<div class="my-5">


			<?php
			if ( have_posts() )
			{
				while ( have_posts() )
				{
					the_post();
					?>

						<div class="main-post single-post">
							<?php
								edit_post_link('<i class="fas fa-pencil-alt"></i> Edit')
							?>

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
								<?php the_content(); ?>
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


					<?php
				}
			}

            /*
			// Get Post ID method 1
            global $post;
            echo $post->ID;

			// Get Post ID method 2
            echo get_queried_object_id();
            */

            //categories ID
            //print_r(wp_get_post_categories(get_queried_object_id()));

            $random_posts_query_args = array(
                'posts_per_page' => 5,
                'orderby' => 'rand',
                'category__in' => wp_get_post_categories(get_queried_object_id()),
                'post__not_in' => array(get_queried_object_id())
            );

            ?>

            <h3 class="random-posts-title pb-3 pt-2 pl-3">Random Posts</h3>

            <div class="row mb-5">

            <?php
            $random_posts = new WP_Query($random_posts_query_args);

	        if ($random_posts->have_posts() )
	        {
		        while ( $random_posts->have_posts() )
		        {
			        $random_posts->the_post();
			        ?>

                    <div class="author-posts col-md-4">
                        <h3 class="post-title border-de bg-white p-3 my-2">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>


			        <?php
		        }
	        }else echo "<div class='alert alert-primary'>There is no Random posts</div>";

            wp_reset_postdata(); // reset loop


			?>
		</div>


        <div class="container bg-white pt-3 mb-4 author-section">
            <div class="row">
                <div class="col-md-2">

		            <?php

		            $id_user = get_the_author_meta('id');
		            $avatar_args = array(
			            'class' => 'img-responsive img-thumbnail d-block mx-auto'
		            );

		            echo get_avatar($id_user , 128,'','User Avatar',$avatar_args);

		            ?>

                </div>
                <div class="col-md-10 author-infos">
                    <h4>
			            <?php  the_author_meta('first_name'); ?>
			            <?php  the_author_meta('last_name'); ?>
                        ( <span class="nickname">
                         <?php  the_author_meta('nickname'); ?>
                    </span> )
                    </h4>
		            <?php if(get_the_author_meta('description')){ ?>
                        <p>
				            <?php  the_author_meta('description'); ?>
                        </p>
		            <?php } else { ?>
                        <p> There is no Biography yet </p>
		            <?php }  ?>
                </div>
            </div>

            <p class="author-stats">

                <span class="posts-count float-left badge badge-dark p-2">
                   User Posts Count : <i class="fas fa-pencil-alt"></i>
                    <?php echo count_user_posts(get_the_author_meta('id')) ?>
                </span> 

                <span class="posts-link float-right badge badge-primary p-2">
                   User Profile Link : <i class="fas fa-link"></i>
                    <?php echo get_the_author_posts_link() ?>
                </span>
                <br>

            </p>

        </div>

        <hr class="comment-separator">

		<div class="row">
			<div class="col">
				<?php
				echo '<div class="post-pagination">';


				if(get_previous_post_link())
				{
					previous_post_link('%link' ,
                        '<i class="fas fa-chevron-left"></i> 
                                &nbsp; Previous Article',
                        true,'','category');
				}else echo '<span class="prev-span">Prev </span>';

				if(get_next_post_link())
				{
					next_post_link('%link',
						' Next Article &nbsp; <i class="fas fa-chevron-right"></i>',
						true,'','category');
				}else echo '<span class="next-span">Next </span>';

				echo '</div>';

				?>
			</div>
		</div>

        <hr class="comment-separator">

        <div class="row">
            <div class="col">
                <?php  comments_template();  ?>
            </div>
        </div>

	</div>





<?php get_footer() ?>