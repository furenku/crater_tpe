<?php

add_filter('show_admin_bar', '__return_false');


add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
   add_post_type_support( 'product', 'excerpt' );
   // add_post_type_support( 'page', 'excerpt' );

}


function registrar_menus() {

   register_nav_menus(
      array(
         'menu-principal' => __( 'Menú Principal' )
      )
   );
}
add_action( 'init', 'registrar_menus' );



function clases_para_lis_menu($classes, $item, $args) {
  $classes[] = 'small-12 columns shareH';
  return $classes;
}
add_filter('nav_menu_css_class','clases_para_lis_menu',1,3);




add_theme_support('post-thumbnails');
