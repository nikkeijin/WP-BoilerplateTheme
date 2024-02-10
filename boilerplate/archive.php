<?php 

    get_header();
    
        // Set your permalink structure to /%postname%/ and enable the 'Has Archive' option for Custom Post Types (CPT). 
        // If you're using custom taxonomies, remember to attach them to the respective CPT (Attach to Post Type option) in your CPT UI Plugin.
    
        if (is_post_type_archive('news') || is_tax(get_object_taxonomies('news'))) {
            locate_template('custom-post-type/news/archive.php', true);
        }
    
        if (is_post_type_archive('portfolio') || is_tax(get_object_taxonomies('portfolio'))) {
            locate_template('custom-post-type/portfolio/archive.php', true);
        }
    
    get_footer();
