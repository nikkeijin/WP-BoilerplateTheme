<h1>Front Page</h1>

<?php 

  /* 
  
  ################################################## 
  
  Description:
  Retrieve all available terms for the specified taxonomy.
  
  Parameter:
  $taxonomy (string) - The name of the taxonomy from which to retrieve terms.
  
  */
  
  // get_taxonomy_terms('information'); 

?>

<?php 

  /* 
  
  ################################################## 

  This is an example of how to retrieve and display up to 5 posts of the 'news' post type in a static page, rather than in archive.php, using a custom WP_Query.
  
  Description:
  Display a loop of posts from the specified post type, limited to a specified number of posts per page.
  
  Parameters:
  $post_type (string) - The name of the post type to retrieve posts from.
  $posts_per_page (int) - The number of posts to display per page.
  
  */
  
  // the_loop('news', 5); 

?>
