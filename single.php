<?php
get_header();

if( have_posts() ) :
   while ( have_posts() ) :
      the_post();
      $post_type = $post->post_type;

      $related_cpts = array(
         'editorial',
         'persona',
         'proyecto',
         'product',
         // 'modelo',
      );

      echo '<h1>'. get_the_title() .'</h1>';

      foreach ($related_cpts as $related_cpt ) :

         $related_cpt_posts = get_post_meta( get_the_ID(), $post_type . '-' . $related_cpt, true );

         if( is_array( $related_cpt_posts ) ) :

            foreach( $related_cpt_posts as $related_cpt_post ) :
               if( (int)($related_cpt_post) ):
                  echo '<h3>' . $related_cpt . ": " .get_post( $related_cpt_post ) -> post_title . '</h1>';
               endif;
            endforeach;

         endif;

      endforeach;

   endwhile;
endif;

get_footer();
