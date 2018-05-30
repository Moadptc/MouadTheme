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
                        <?php the_title('<h3 class="post-title">','</h3>'); ?>
                    </div>
                </div>

		<?php
		    }
	    }
	    ?>



    </div>
</div>




<?php get_footer() ?>