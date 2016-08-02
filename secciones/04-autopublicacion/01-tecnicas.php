<?php

global $pagina_actual;

$paginas_hijas = get_pages( array( 'child_of' => $pagina_actual   ->ID ) );
?>

<h1>
   <?php echo apply_filters('the_title', $pagina_actual->post_title); ?>
</h1>

<section class="columns paginas_hijas h_90vh p5">
   <?php

   foreach ($paginas_hijas as $pagina_hija ) :

      ?>

      <article class="pagina_hija button hollow columns small-12 medium-6 large-4 h_30vh p5 rel">

         <a href="<?php echo get_the_permalink( $pagina_hija->ID ); ?>">

            <div class="imagen w_100 h_100 absUpL z0 imgLiquid imgLiquidFill">

               <?php echo get_the_post_thumbnail($pagina_hija->ID); ?>

            </div>

            <div class="texto w_100 h_100 absUpL z1 ">

               <div class="vcenter h_a">
                  <h4 class="text-center p2">
                     <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
                  </h4>
               </div>

            </div>


         </a>

      </article>

      <?php


   endforeach;

   ?>

</section>
