<?php

/* 

################################################## 

Style & JavaScript

*/
function sample()
{

    //CSS
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/style.css' );

    //Movabletype
    wp_enqueue_script('movabletype', 'https://form.movabletype.net/dist/parent-loader.js', null, null, true );

    //JavaScript
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), null, true );

}
add_action('wp_enqueue_scripts', 'sample');


/* 

################################################## 

Defer & Async

*/

//Adds the defer attribute to the script tag
add_filter('script_loader_tag', 'add_defer', 10, 2);
function add_defer($tag, $handle)
{

  if ($handle !== 'movabletype') {
    return $tag;
  }
  
  return str_replace(' src=', ' defer src=', $tag);

}

//Adds the async attribute to the script tag
add_filter('script_loader_tag', 'add_async', 10, 2);
function add_async($tag, $handle)
{

  if ($handle !== 'movabletype') {
    return $tag;
  }
  
  return str_replace(' src=', ' async src=', $tag);

}


/* 

##################################################

Add the following code in your header.php <head> tag to use the functions below
<?php custom_title(); ?>
<?php custom_meta(); ?>

*/

// Custom Title
function custom_title()
{

    $company_name = 'Company Name';
    $get_the_title = get_the_title();
    $get_the_year = get_the_date('Y');

    if (is_page())
        $title = "{$get_the_title}｜{$company_name}";
    if (is_front_page())
        $title = "{$company_name}｜Home";
    if (is_post_type_archive('news') || is_tax(get_object_taxonomies('news')))
        $title = "ニュース｜{$company_name}";
    if (is_singular('news'))
    $title = "{$get_the_title}｜{$get_the_year}｜{$get_the_title}";
    if (is_404())
        $title = "お探しのページが見つかりません｜{$company_name}";
    if (is_search())
        $title = "Description｜Company";

    echo "<title>$title</title>";

}

// Custom Meta
function custom_meta()
{

    $get_the_title = get_the_title();

    // Front Page
    if (is_front_page()) {
        $meta = [
            'description' => 'This is home page description...',
            'words' => 'Home, Page, Key, Word'
        ];

        echo "<meta name='description' content='{$meta['description']}'>";
        echo "<meta name='keywords' content='{$meta['words']}'>";

    }

    // News Archive
    if (is_post_type_archive('news') || is_tax('news-category')) {
        $meta = [
            'description' => 'This is news archive page description...',
            'words' => 'News, Archive, Key, Word'
        ];

        echo "<meta name='description' content='{$meta['description']}'>";
        echo "<meta name='keywords' content='{$meta['words']}'>";

    }

    // Singular News
    if (is_singular('news')) {
        $meta = [
            'description' => "{$get_the_title} news page description!",
            'words' => 'Singular, News, Page, Key, Word'
        ];

        echo "<meta name='description' content='{$meta['description']}'>";
        echo "<meta name='keywords' content='{$meta['words']}'>";
    }

    // Static Pages
    if (is_page()) {

        $is_page = [
            "about" => [
                "description" => "This is about page description...",
                "words" => "About, Page, Description"
            ],
            "service" => [
                "description" => "This is service page description...",
                "words" => "Service, Page, Description"
            ],
            "contact" => [
                "description" => "This is contact page description...",
                "words" => "Contact, Page, Description"
            ],
            "privacy-policy" => [
                "description" => "This is privacy-policy page description...",
                "words" => "Privacy, Policy, Page, Description"
            ],
        ];

        foreach ($is_page as $page_name => $page_meta) {
            if (is_page($page_name)) { echo "
                <meta name='description' content='{$page_meta['description']}'>
                <meta name='keywords' content='{$page_meta['words']}'>";
            }
        }

    }

}
