<?php

//single tempate initialization for portfolios post type
function change_portfolios_single_template($single_template) 
{
     global $post;

     if ($post->post_type == 'portfolios') 
     {
          $single_template = plugin_dir_path( __FILE__ ) . 'single/single.php';
     }

     return $single_template;
}