<section id="inicio-catalogo" class="contenedor_titular_interactivo small-12 columns p0 m0 ha">

   <h1 class="titular_interactivo">Nuestro catálogo</h1>

   <?php
   $catalogo = get_page_by_title("Catálogo");
   set_query_var( 'pagina_a_cargar', $catalogo->ID );
   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

   $pagina_superior = get_page_by_title( "Catálogo" );

   $paginas = get_pages( array('parent'=>$pagina_superior->ID));


   foreach ($paginas as $pagina) :

      ?>

      <article id="inicio-catalogo" class="small-12 large-4 columns p3  h_80vh h_md_25vh h_sm_25vh">

         <a href="<?php echo get_the_permalink( $pagina -> ID ); ?>">

            <div class="small-4 large-12 columns h_30 h_md_100 h_sm_100 imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail(  $pagina->ID , 'large' ); ?>
            </div>

            <h3 id="inicio-catalogo-producto-titulo" class="small-8 medium-8 large-12 columns p0 pt1 text-center">
               <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
            </h3>

            <div id="inicio-catalogo-producto-extracto" class="small-8 medium-8 large-12 columns p0 pt1 fontL font_md_M font_sm_S text-left h_50">
               <div class="small-12 vcenter">
                  <?php echo apply_filters( 'the_excerpt', $pagina->post_excerpt ); ?>
               </div>
            </div>

         </a>



      </article>




      <?php

   endforeach;

   ?>


   <?php

   // get_template_part("secciones/02-inicio/02-catalogo-sliders");

   ?>
</section>
