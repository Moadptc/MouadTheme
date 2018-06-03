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
                        <li><?php  the_author_meta('first_name'); ?></li>
                        <li><?php  the_author_meta('last_name'); ?></li>
                        <li><?php  the_author_meta('nickname'); ?></li>
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
                    <span>0</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats">
                    Comment Count
                    <span>0</span>
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
        </div>
    </div>

<?php get_footer();  ?>