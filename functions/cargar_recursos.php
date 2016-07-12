<?php

function cargar_estilos() {

   wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400|Open+Sans:400,300italic,300,400italic,600' );

   wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick.css' );
   wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick-theme.css' );

   wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/css/app.css' );

}

function cargar_scripts() {

   wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.js' );
   wp_enqueue_script( 'what-input', get_stylesheet_directory_uri() . '/bower_components/what-input/what-input.js' );
   wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/bower_components/foundation-sites/dist/foundation.js', array('jquery') );
   wp_enqueue_script( 'imgLiquid', get_stylesheet_directory_uri() . '/bower_components/imgLiquid/js/imgLiquid-min.js' );
   wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick.js' );
   wp_enqueue_script( 'frontendutils', get_stylesheet_directory_uri() . '/js/frontendutils.js', array('jquery') );
   wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array('jquery', 'foundation', 'imgLiquid') );


   wp_enqueue_script( 'tienda', get_stylesheet_directory_uri() . '/js/tienda.js', array('jquery', 'foundation', 'imgLiquid') );
   wp_localize_script( 'tienda', 'tpe_ajax',
      array(
         'ajaxurl' => admin_url( 'admin-ajax.php' )
      )
   );

}


function cargar_recursos() {

   cargar_estilos();

   cargar_scripts();

}

add_action('wp_enqueue_scripts', 'cargar_recursos' );
