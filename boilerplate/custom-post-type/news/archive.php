<h2>Category</h2>
<?php get_taxonomy_terms('news-category'); ?>

<hr>

<h1>News</h1>
<?php the_loop('news'); ?>
<?php custom_posts_pagination(); ?>
