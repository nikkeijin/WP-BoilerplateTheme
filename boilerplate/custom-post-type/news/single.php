<?php the_title(); ?>

<br>

<?= get_the_date('Y.n.j'); ?>

<br>

<?= the_taxonomy_term('information') ?>

<?= the_taxonomy_term('department') ?>

<hr>
<?php the_content(); ?>
<hr>

<?php $prev_post = get_previous_post(); if (!empty($prev_post)): ?>
<a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev-post"> &laquo; Previous</a>
<?php endif; ?>

<?php $next_post = get_next_post(); if (!empty($next_post)): ?>
<a href="<?php echo get_permalink($next_post->ID); ?>" class="next-post"> Next &raquo;</a>
<?php endif; ?>
