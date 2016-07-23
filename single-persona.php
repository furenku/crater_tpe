<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      $editoriales = get_post_meta( get_the_ID(), 'editorial-persona', true );

      foreach( $editoriales as $editorial ) :
         if( (int)($editorial) ):
            echo '<h1>' . get_post( $editorial ) -> post_title . '</h1>';
         endif;
      endforeach;

   }
}

get_footer();
