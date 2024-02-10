# WordPress Boilerplate Theme

## Description

This GitHub repository serves as a versatile base template for developing WordPress themes. While primarily created for personal use, it's open for anyone looking to kickstart their WordPress theme development.
    
## How to Use this Boilerplate Theme

### 1. Clone or Download the Repository:

- To get started, clone this repository to your local environment using Git or download it as a ZIP file and extract it to your WordPress themes directory.


### 2. Theme Activation:

- Inside your WordPress installation directory, navigate to the "wp-content" folder.
- Within "wp-content," you'll find a folder called "themes." This is where you should place the theme folder. Your directory structure should look like this:
```
- wp-content
  - themes
    - boilerplate (or your renamed theme folder)
      - (theme files and directories)
```

- In your WordPress admin dashboard, navigate to "Appearance" > "Themes."
- Activate the "boilerplate" (or your renamed theme folder) from the list of available themes.


### 3. Customizing Title and Meta Tags:

- The theme provides a set of custom functions to dynamically generate title and meta tags for different pages. You can find these functions in the `functions/head.php` file. This is where you can define what each page should display in terms of titles and meta information.

`<?php custom_title(); ?>`      
This function generates a custom title tag based on the page type.

`<?php custom_meta(); ?>`       
This function to generate custom meta tags for better SEO.


### 4. CSS Styling:

- The `style.css` file in the root folder contains basic theme information and should be used for WordPress theme identification. 
- For your actual CSS styling, it's recommended to place your styles in the `assets/css/style.css` file. You can use this file to write your custom styles or include additional libraries such as `SCSS` or `Tailwind CSS`.


### 5. Page Templates:

- The theme includes several sample static pages such as `"about"`, `"service"`, and `"contact"`. These pages serve as a starting point and can be adjusted according to your specific project needs. You can customize these templates by editing the `index.php` file and changing or creating the file names inside the 'pages' folder.
    
- Important to mention `"front-page"` and `"404"` are part of the default WordPress structure and serve as the home page and error page templates, respectively. These templates can also be customized to align with your site's branding and content requirements.
    
- To utilize the sample pages, you'll need to create pages with the corresponding slugs: `"about"`, `"service"`, and `"contact"`. These slugs will ensure that the template files are properly matched and loaded by the code. In summary, always ensure that the page slug matches the `KEY` of the `$is_page` array for proper functionality.

- To create a new page in WordPress, navigate to the "Pages" section in the dashboard menu and press the button "Add New."
        
### 6. Custom Post Types:

- If you plan to add or change custom post types, you can do so by editing the `archive.php` and `single.php` templates. These templates are used to display collections of custom post types (archive) and individual custom post type entries (single).
    
### 7. Search Functionality:

- To enhance WordPress default search functionality, consider installing the `"Search Everything"` plugin mentioned in `search.php`. This plugin enables you to search by custom post types and taxonomies.


### 8. Password Protection:

- You can protect specific pages with a password using HTTP Basic Authentication, as implemented in the code found in `header.php`. To secure certain pages, update the array with the appropriate `is_page('page-slug')`, `username`, and `password` for access. This method ensures that only authorized users with the correct credentials can view the protected content.

### 9. Understanding the Functions Defined in functions.php:

- This file serves as the central hub for defining various functions and includes additional files, each with specific functions.

#### functions.php:
```php

    locate_template('functions/admin.php', true);
    locate_template('functions/security.php', true);
    locate_template('functions/head.php', true);
    locate_template('functions/theme.php', true);

```

#### functions/admin.php:
- Removes the admin bar from the top of all pages.
- Removes the default post type for situations where you don't need a blog.
- Removes comments entirely from your site, including menu items and support for comments in posts and pages.
- Hides the CPT UI & ACF from the admin bar.
    
#### functions/security.php:
- Enhances site security by protecting it from malicious requests, including those with excessively long URIs and potentially harmful keywords.
- Removes the WordPress version number from your site's headers to improve security.
    
#### functions/head.php:
- Enqueues CSS and JavaScript files for your theme.
- Adds the defer attribute to specified script tags for improved page loading performance.
- Defines functions for customizing the title and meta tags for different types of pages, including the `front-page`, `archive`, `singular`, and `static-pages`.
  
#### functions/theme.php:
- Redirects authors to a specified page, such as the 404 error page.
- Sets the length of excerpts to 20 words.
- Renders a custom or default loop based on the context of the page, handling both front page, individual pages, post-type archives, and taxonomy pages.
- Sets the number of posts per page for specific post types on archive pages and taxonomy pages.
- Removes the default 'previous' and 'next' navigation from pagination.
- Provides functions for displaying and retrieving taxonomy terms with customized display options based on specific conditions.

For more functions and additional code snippets, please visit [here](https://github.com/nikkeijin/wordpress/tree/main/codes).

### 10. Extending Functionality with Plugins:

- Enhance your theme's capabilities by incorporating plugins.
Explore a selection of recommended plugins [here](https://github.com/nikkeijin/wordpress/tree/main/plugins).


##### Consider this base theme as your canvas to create something extraordinary. Embrace its adaptability, and let your imagination run wild to craft a website that truly reflects your project's individuality!
