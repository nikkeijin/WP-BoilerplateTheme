<?php

    $title = get_the_title();

    if (is_post_type_archive('news') || is_tax(get_object_taxonomies('news'))) $title = 'News';
    if (is_404()) $title = 'お探しのページが見つかりませんでした';

?>

<h1><?= $title; ?></h1>
