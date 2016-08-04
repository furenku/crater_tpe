<?php

$post_type = $post->post_type;

$related_cpts = array(
   'editorial',
   'persona',
   'proyecto',
   'product',
   // 'modelo',
);

foreach ($related_cpts as $related_cpt ) :

   $cpt_plural = get_post_type_object( $related_cpt )->labels->name;
   $cpt_singular = get_post_type_object( $related_cpt )->labels->singular_name;

   if( $cpt_singular == "Product" ) $cpt_singular = "Publicación / Taller";

   if( $cpt_plural == "Products" ) $cpt_plural = "Publicación / Taller";

   $related_cpt_posts = get_post_meta( get_the_ID(), $post_type . '-' . $related_cpt, true );

   if( is_array( $related_cpt_posts ) ) :

      $valid_posts = array();

      foreach( $related_cpt_posts as $related_cpt_post ) :
         if( (int)($related_cpt_post) ):
            array_push( $valid_posts, $related_cpt_post );
         endif;
      endforeach;

      if( count($valid_posts)>0):
      ?>
      <section id="related_<?php echo $related_cpt_post; ?>" class="columns">

         <?php
         if( count($valid_posts) > 0 ) : ?>

            <h5>
               <?php echo count( $valid_posts ) == 1 ? $cpt_singular : $cpt_plural; ?>
            </h5>

            <?php
            foreach( $valid_posts as $related_cpt_post ) :
               if( (int)($related_cpt_post) ): ?>
                  <div class="columns small-4 medium-3 large-2 p0 pt1 end">
                     <a href="<?php echo get_the_permalink( $related_cpt_post ); ?>">
                        <h6>
                           <?php echo get_post( $related_cpt_post ) -> post_title; ?>
                        </h6>
                        <div class="columns imagen imgLiquid imgLiquidFill h_20vh">
                           <?php echo get_the_post_thumbnail($related_cpt_post); ?>
                        </div>
                     </a>
                  </div>
                  <?php
               endif;

            endforeach;

         endif;

         ?>
      </section>
      <?php
      endif;

   endif;

endforeach;

?>
