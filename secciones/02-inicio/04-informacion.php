<section id="inicio-informacion" class="contenedor_titular_interactivo small-12 columns h_90vh  p0 m0">

   <h1 class="titular_interactivo">Información</h1>


   <?php
   set_query_var( 'pagina_a_cargar', get_page_by_title("Información")->ID );

   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

   $pagina_superior = get_page_by_title("Información");
   $paginas = get_pages( array('parent'=>$pagina_superior->ID));


   $clase="inicio-informacion";
   foreach ($paginas as $pagina) :

      ?>

      <!-- primer bloque -->
      <div id="<?php echo $clase; ?>-X" class="small-12 medium-6 large-3 columns p5 rel h_50 h_md_25 h_sm_25">
         <a href="<?php echo get_the_permalink($pagina->ID); ?>" class="h_100">

            <div id="<?php echo $clase; ?>-imagen" class="h_40 w_100 z0 imgLiquid imgLiquidNoFill">
               <?php echo get_the_post_thumbnail( $pagina -> ID, 'medium' ); ?>
            </div>
            <div class="texto h_60 pt1 m0">

               <div id="<?php echo $clase; ?>-titulo" class="small-12 columns h_3em p2 font_md_L font_sm_M text-center">
                  <div class="vcenter h_a">
                     <h5>
                        <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
                     </h5>
                  </div>
               </div>

               <div id="<?php echo $clase; ?>-texto" class="small-12 columns h_30 p0 pt1 fontM font_md_S font_sm_XS text-left">
                  <?php echo apply_filters( 'the_excerpt', $pagina->post_excerpt ); ?>
               </div>

            </div>

         </a>

      </div>

      <?php
   endforeach;
   ?>


</section>
