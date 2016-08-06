<?php

global $pagina_actual;

$paginas_hijas = get_pages( array( 'child_of' => $pagina_actual   ->ID ) );
?>


<section class="paginas_hijas contenedor_titular_interactivo columns  h_a p5">
   <?php

foreach ($paginas_hijas as $pagina_hija ) :

   ?>

   <h1 class="titular_interactivo">
      <?php echo apply_filters('the_title', $pagina_actual->post_title); ?>
   </h1>

   <article class="pagina_hija columns small-12 medium-6 large-4 h_40vh p5 mb2">
      <a href="<?php echo get_the_permalink( $pagina_hija->ID ); ?>" class="w_100 h_100">
         <h4 class="mb1">
            <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
         </h4>
         <div class="imagen columns h_50 imgLiquid imgLiquidFill">
            <?php echo get_the_post_thumbnail($pagina_hija->ID); ?>
         </div>
         <div class="texto columns h_50 pt1">

            <div class="extracto fontM">
               <?php echo apply_filters('the_excerpt', $pagina_hija->post_excerpt); ?>
            </div>

         </div>
      </a>

   </article>

   <?php


endforeach;

?>

   </section>
