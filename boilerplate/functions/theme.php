<?php

/*

################################################## 

Redirect to desired page

*/
function redirect_page()
{
    if (is_author()) wp_redirect(esc_url(home_url('404')));
}
add_action('template_redirect', 'redirect_page');


/*

################################################## 

Excerpt length

*/
function custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');


/* 

################################################## 

The Loop

Renders a custom or default loop based on the context of the page, handling both front page, individual pages, post type archives, and taxonomy pages.

- Default Loop: 
Displays posts for post type archives and taxonomy pages.

- Custom Loop: 
Generates and displays posts for the front page and individual pages based on specified post types.

*/
function the_loop($post_type = "post", $posts_per_page = 10)
{

    // Default Loop
    if (is_post_type_archive($post_type) || is_tax(get_object_taxonomies($post_type))){

        if (have_posts()):
            while (have_posts()):
                the_post();
                get_template_part("components/post/$post_type");
            endwhile; else: 
                // 404
        endif;

        wp_reset_postdata();

    }

    // Custom Loop
    if (is_front_page() || is_page()){

        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_per_page,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                get_template_part("components/post/$post_type");
            endwhile;
        endif;

        wp_reset_postdata();

    }

}


/* 

################################################## 

Posts per page for archive.php and taxonomy.php

*/
function archive_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) return;

    $post_types_to_modify = array(
        'news' => 10,
        'portfolio' => 12,
    );

    foreach ($post_types_to_modify as $post_type => $posts_per_page) {
        if (is_post_type_archive($post_type) || is_tax(get_object_taxonomies($post_type))) {
            $query->set('post_type', $post_type);
            $query->set('posts_per_page', $posts_per_page);
            return;
        }
    }
}
add_action('pre_get_posts', 'archive_posts_per_page');


/* 

################################################## 

Clear the 'previous' and 'next' from the_posts_pagination function

*/
function custom_posts_pagination()
{
    the_posts_pagination(
        array(
            'prev_text' => '',
            'next_text' => '',
        )
    );
}


/* 

################################################## 

Taxonomy Term related functions

* About display_term() function:

- You may customize the display of the taxonomy term based on specific conditions, such as page type or other criteria. 
You can achieve this by adding conditional statements to tailor the design:

if (is_post_type_archive('portfolio')) echo ...
if (is_tax(get_object_taxonomies('portfolio')) echo ...
if (is_singular('portfolio')) echo ...
if ($term->taxonomy == 'portfolio-category') echo ...

- Add custom class based on specific conditions, such as term slug or other criteria.
You can achieve this by adding conditional statements to tailor the design:

if ($term->taxonomy == 'XXX') $term_class = 'XXX';
if ($term->slug == 'XXX') $term_class = 'XXX';

*/

// This function is designed to display the taxonomy term for the current post, along with a URL to the corresponding term archive page.
function the_taxonomy_term($taxonomy) 
{

    $terms = get_the_terms(get_the_ID(), $taxonomy);

    if (empty($terms) || is_wp_error($terms)) return;

    foreach ($terms as $term) { 
        display_term($term); 
    }

}

// This function retrieves and displays all available terms for a given taxonomy, each with a URL to its corresponding term archive page.
function get_taxonomy_terms($taxonomy)
{

    $terms = get_terms($taxonomy);

    if (empty($terms) || is_wp_error($terms)) return;

    foreach ($terms as $term) {
        display_term($term);
    }

}

// Display the URL to the archive page of the provided taxonomy term
function display_term($term)
{

    $term_link = get_term_link($term);

    if (is_wp_error($term_link)) return;

    $term_class = 'term-class';

    echo '<a href="' . esc_url($term_link) . '" class="' . $term_class . '">' . $term->name . '</a><br>';

}
