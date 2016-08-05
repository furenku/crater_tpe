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

   <article class="pagina_hija columns small-12 medium-6 h_30vh p5 mb2">

      <h4 class="mb1">
         <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
      </h4>
      <div class="imagen columns small-6 imgLiquid imgLiquidFill">
         <?php echo get_the_post_thumbnail($pagina_hija->ID); ?>
      </div>
      <div class="texto columns small-6">
         <div class="vcenter h_a">
            <div class="extracto fontS">
               <?php echo apply_filters('the_excerpt', $pagina_hija->post_excerpt); ?>
            </div>
         </div>
      </div>

   </article>

   <?php


endforeach;

?>

   </section>
