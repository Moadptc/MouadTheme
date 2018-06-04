<?php get_header();  ?>

    <div class="container author-page">
        <h1 class="display-4 my-4 text-center profile-header">
		    <?php  the_author_meta('nickname'); ?> Page
        </h1>
        <div class="author-main-info bg-white p-4">
            <div class="row">
                <div class="col-md-12">

                </div>

                <br>
                <div class="col-md-3">
			        <?php

			        $id_user = get_the_author_meta('id');
			        $avatar_args = array(
				        'class' => 'img-responsive img-thumbnail d-block mx-auto'
			        );

			        echo get_avatar($id_user , 196,'','User Avatar',$avatar_args);

			        ?>
                </div>
                <div class="col-md-9">
                    <ul class="list-unstyled">
                        <li>First name :
                            <span class="author-name"><?php  the_author_meta('first_name'); ?></span>
                        </li>
                        <li>Last name :
                            <span class="author-name"><?php  the_author_meta('last_name'); ?></span>
                        </li>
                        <li>Nickname :
                            <span class="author-name"><?php  the_author_meta('nickname'); ?></span>
                        </li>

                    </ul>
                    <hr>
			        <?php if(get_the_author_meta('description')){ ?>
                        <p>
					        <?php  the_author_meta('description'); ?>
                        </p>
			        <?php } else { ?>
                        <p> There is no Biography yet </p>
			        <?php }  ?>

                </div>
            </div>
        </div>


        <div class="row author-stats">
            <div class="col-md-3">
                <div class="stats">
                    Post Count
                    <span><?php echo count_user_posts(get_the_author_meta('id')) ?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats">
                    Comment Count
                    <span>
                        <?php

                            $comments_count_args = array(
                                 'user_id' => get_the_author_meta('id'),
                                 'count' => true
                            );

                            echo get_comments($comments_count_args);

                        ?>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats">
                    Total Posts View
                    <span>0</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats">
                    hello
                    <span>0</span>
                </div>
            </div>
        </div> <!-- end row -->

        <div>
	        <?php

	        $posts_count = count_user_posts(get_the_author_meta('id'));
            $author_posts_per_page = 5;


            $author_posts_query_args = array(
                    'author' => get_the_author_meta('id'),
                    'posts_per_page' => $author_posts_per_page
            );


            $author_posts_query = new WP_Query($author_posts_query_args);

	        if ($author_posts_query->have_posts() )
	        {
	        ?>
               <h3 class="author-posts-title">
                   <?php if($posts_count > 5){ ?>

                        Latest [ <?php  echo $author_posts_per_page;  ?> ] Posts Of
                        <?php  the_author_meta('nickname');  ?>

	               <?php }else{ ?>

                        Latest [ <?php  echo $posts_count;  ?> ] Posts Of
		                <?php  the_author_meta('nickname');  ?>

	               <?php } ?>
               </h3>

            <?php
		        while ( $author_posts_query->have_posts() )
		        {
			        $author_posts_query->the_post();
			        ?>
                <div class="author-posts bg-white pr-3 pl-3 mt-2 pt-3">
                    <div class="row">
                        <div class="col-sm-3">
		                    <?php
                            the_post_thumbnail('',
			                    [
				                    'class'=>'img-fluid img-responsive',
				                    'title'=>'Post img'
			                    ]);
		                    ?>
                        </div>

                        <div class="col-sm-9">

                            <h3 class="post-title">
                                <a href="<?php the_permalink() ?>">
				                    <?php the_title(); ?>
                                </a>
                            </h3>

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

                                </a>
                            </div>
                            <div class="post-content ">
			                    <?php the_excerpt(); ?>
                            </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>


			        <?php
		        }
	        }

            wp_reset_postdata(); // reset loop

            /*--------------- comments -----------------------*/

            // comment count array
	        $comments_count_args = array(
		        'user_id' => get_the_author_meta('id'),
		        'count' => true
	        );

	        $comments_count = get_comments($comments_count_args);
	        $comments_per_page = 5;
	        ?>

            <h3 class="author-comments-posts-title mt-4">
		        <?php if($comments_count > $comments_per_page){ ?>

                    Latest [ <?php  echo $comments_per_page;  ?> ] Comments Of
			        <?php  the_author_meta('nickname');  ?>

		        <?php }else{ ?>

                    Latest [ <?php  echo $comments_count;  ?> ] Comments Of
			        <?php  the_author_meta('nickname');  ?>

		        <?php } ?>
            </h3>

            <?php
	        $comments_args = array(
		        'user_id' => get_the_author_meta('id'),
		        'status' => 'approve',
		        'number' => $comments_per_page,
		        'post_status' => 'publish',
		        'post_type' => 'post',
	        );

	        $comments = get_comments($comments_args);

            if($comments):

	            foreach ($comments as $comment)
	            {  // $comment->comment_post_ID

		            ?>

                    <div class="bg-white leteast-comments col-md-12 mt-3 px-3 pb-2 pt-1 ">

                        <div class="comment-link mb-2">
                            <div class="row">
                                <div class="col">
                                    <h3>
                                        <a href="<?php echo get_permalink($comment->comment_post_ID) ?>">
		                                    <?php echo get_the_title($comment->comment_post_ID)  ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="comment-on-date mb-2">
                            <div class="row">
                                <div class="col">
                                    <span class="badge badge-dark p-2">
                                        <i class="fas fa-calendar"></i>
                                        Added On :
	                                    <?php echo mysql2date('l, M d ,Y',$comment->comment_date)   ?>
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="comment-content mb-2">
                            <div class="row">
                                <div class="col text-dark">
	                                <?php echo substr( ($comment->comment_content) , 1 , 300)   ?>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="clearfix"></div>

                    <?php
	            } /*  end comments foreach */

            else:
                echo 'there s no comments ';
            endif;


	        ?>

        </div>

    </div>

<?php get_footer();  ?>