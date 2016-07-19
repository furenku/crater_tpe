<section id="inicio-autopublicacion" class="contenedor_titular_interactivo small-12 columns p0 m0 h_90vh">


   <h1 class="titular_interactivo">Autopublicación</h1>

   <?php

   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

   $pagina_superior = get_page_by_title("Autopublicación");
   $paginas = get_pages( array('parent'=>$pagina_superior->ID));

   $clase="inicio-autopublicacion";
   foreach ($paginas as $pagina) :

      ?>

      <!-- primer bloque -->
      <div id="<?php echo $clase; ?>-X" class="small-12 medium-4 columns p5 rel h_50 h_md_25 h_sm_25">
         <a href="<?php echo get_the_permalink($pagina->ID); ?>" class="w_100 h_100">

            <div id="<?php echo $clase; ?>-imagen" class="h_100 w_100 absUpL imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail( $pagina -> ID, 'large' ); ?>
            </div>
            <div class="titulo w_100  h_100 absUpL z1 pt1 m0">
               <div class="vcenter w_100 h_a text-center color_blanco">
                  <h2>
                     <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
                  </h2>
               </div>
            </div>

         </a>

      </div>

      <?php
   endforeach;
   ?>




   <?php for ($i=0; $i < 3; $i++) : ?>

      <a href="#">
         <div id="inicio-autopublicacion-X" class="small-12 medium-4 columns p0 rel h_50 h_md_40 h_sm_40">

            <div id="inicio-autopublicacion-uno-texto" class="small-12 p3 font_md_XL font_sm_L text-center">

            </div>

         </div>
      </a>

   <?php endfor; ?>

</section>
