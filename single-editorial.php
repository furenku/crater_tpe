<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      echo '<h1>'. get_the_title() .'</h1>';

      $productos = get_post_meta( get_the_ID(), 'editorial-product', true );

      if( is_array( $productos ) ) :

         foreach( $productos as $producto ) :
            if( (int)($producto) ):
               echo '<h1>' . get_post( $producto ) -> post_title . '</h1>';
            endif;
         endforeach;

      endif;

      $personas = get_post_meta( get_the_ID(), 'editorial-persona', true );


      if( is_array( $personas ) ) :

         foreach( $personas as $persona ) :
            if( (int)($persona) ):
               echo '<h1>' . get_post( $persona ) -> post_title . '</h1>';
            endif;
         endforeach;

      endif;

   }
}

get_footer();
