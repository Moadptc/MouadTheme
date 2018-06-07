<?php


$all_cats = get_the_category();

/*
echo '<pre>';
print_r($all_cats);
echo '</pre>';

echo $all_cats[0]->term_id;  // get the id of category
*/



?>

<nav aria-label="breadcrumb" class="breadcrumbs-holder">
	<div class="container">
		<ol class="breadcrumb p-3">
			<li class="breadcrumb-item">
				<a href="<?php bloginfo('url') ?>">
					<?php echo get_bloginfo('name'); ?>
				</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?php echo esc_url(get_category_link($all_cats[0]->term_id)) ;  ?>">
					<?php echo esc_html($all_cats[0]->name); ?>
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_the_title(); ?>
			</li>
		</ol>
	</div>
</nav>