<?php

add_filter('show_admin_bar', '__return_false');


add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
   add_post_type_support( 'product', 'excerpt' );
   // add_post_type_support( 'page', 'excerpt' );

}


add_theme_support('post-thumbnails');
