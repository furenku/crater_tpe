<?php

global $pagina_actual;

$paginas_hijas = get_pages( array( 'child_of' => $pagina_actual   ->ID ) );
?>



   <h1 class="titular_interactivo">
      <?php echo apply_filters('the_title', $pagina_actual->post_title); ?>
   </h1>
   <?php

   foreach ($paginas_hijas as $pagina_hija ) :

      ?>

      <article class="pagina_hija columns small-6 medium-4 large-3 p3 rel">

         <a href="<?php echo get_the_permalink( $pagina_hija->ID ); ?>" class="p5">
            <div class="columns squareH rel">

               <div class="imagen w_100 h_100 absUpL z0 imgLiquid imgLiquidFill">
                  <?php echo get_the_post_thumbnail($pagina_hija->ID); ?>
               </div>

               <div class="texto w_100 h_100 absUpL z1 p4">

                  <div class="vcenter h_a">
                     <h3 class="text-center p2 color_blanco font1 bold txsh">
                        <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
                     </h3>
                  </div>

               </div>
            </div>


         </a>

      </article>

      <?php


   endforeach;

   ?>
