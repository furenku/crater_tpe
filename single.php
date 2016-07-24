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

         $cpt_plural = get_post_type_object( $related_cpt )->labels->name;

         $related_cpt_posts = get_post_meta( get_the_ID(), $post_type . '-' . $related_cpt, true );

         if( is_array( $related_cpt_posts ) ) :
            ?>
            <section id="related_<?php echo $related_cpt_post; ?>" class="shareW p5">

               <h2>
                  <?php echo $cpt_plural; ?>
               </h2>
               <?php


            foreach( $related_cpt_posts as $related_cpt_post ) :
                  if( (int)($related_cpt_post) ):
                     ?>
                     <a href="<?php echo get_the_permalink( $related_cpt_post ); ?>">
                        <h3>
                           <?php echo get_post( $related_cpt_post ) -> post_title; ?>
                        </h3>
                     </a>
                     <?php
                  endif;

            endforeach;

            ?>
         </section>
         <?php

         endif;

      endforeach;

   endwhile;
endif;

get_footer();
