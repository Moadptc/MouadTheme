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
                        <p class="post-content">
	                        <?php the_excerpt(); ?>
                        </p>

                        <hr>
                        <p class="categories">
                            <i class="fas fa-tags fa-fw"></i>
                            <?php the_category(', '); ?>
                        </p>
                    </div>
                </div>

		<?php
		    }
	    }
	    ?>



    </div>
</div>




<?php get_footer() ?>