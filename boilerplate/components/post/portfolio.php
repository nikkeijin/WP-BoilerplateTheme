<article>
    <div>
        <p><?= get_the_date('Y.n.j'); ?></p>
        <?= the_taxonomy_term('technology') ?>
    </div>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</article>
