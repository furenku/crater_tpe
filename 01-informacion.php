<?php
/*
Template Name: Información
*/

global $paginas_informacion;
get_header();
$i=0;
?>

<div class="row p5">

   <?php foreach ($paginas_informacion as $pagina_informacion ): $i++;?>

      <section id="pagina_informacion_<?php echo $pagina_informacion->ID; ?>">

         <h2>
            <?php echo apply_filters('the_title', $pagina_informacion->post_title); ?>
         </h2>


         <div class="imagen columns small-6 h_40vh imgLiquid imgLiquidFill">
            <?php echo get_the_post_thumbnail($pagina_informacion->ID,'medium'); ?>
         </div>

         <div class="extracto columns small-6 h_40vh imgLiquid imgLiquidFill">
            <div class="vcenter h_a">
               <?php echo apply_filters('the_content', $pagina_informacion->post_content); ?>
            </div>
         </div>

         <div class="columns mt2 p5">

            <?php
            for ($i=0; $i < 8; $i++) {
               ?>

               <article id="informacion_X" class="columns small-6 medium-4 large-3 h_30vh p5">
                  <div class="color_blanco_bg h_100 m0 p3">
                     <div class="vcenter h_a">
                        <h4 class="ha">
                              Título de Elemento
                        </h4>
                     </div>
                  </div>
               </article>

               <?php
            }
            ?>
         </div>

      </section>

   <?php endforeach; ?>

</div>


<?php

get_footer();
