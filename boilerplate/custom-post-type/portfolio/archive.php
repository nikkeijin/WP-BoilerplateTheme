<h2>Category</h2>
<?php get_taxonomy_terms('portfolio-category'); ?>

<hr>

<h1>News</h1>
<?php the_loop('portfolio'); ?>
<?php custom_posts_pagination(); ?>
