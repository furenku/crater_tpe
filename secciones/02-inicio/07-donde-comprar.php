<?php $pagina = get_page_by_title("Dónde comprar"); ?>
<section id="inicio-donde-comprar" class="contenedor_titular_interactivo small-12 columns p0 m0 h_90vh">

   <h1 class="titular_interactivo">Dónde comprar</h1>

   <div id="inicio-donde-comprar-parrafos" class="small-12 large-6  columns p0 h_50 h_md_40 h_sm_40 mb2 fontL">
      <div class="vcenter h_a p5">
         <?php echo apply_filters( 'the_content', $pagina->post_content ); ?>
      </div>
   </div>

   <div id="inicio-donde-comprar-imagen" class="small-12 large-6  columns p0 h_60 h_md_30 h_sm_30 mb2">

      <div class="large-12 columns h_100 imgLiquid imgLiquidFill">
         <?php echo get_the_post_thumbnail( $pagina->ID, 'large' ); ?>
      </div>

   </div>


   <?php
   set_query_var( 'pagina_a_cargar', get_page_by_title("Dónde comprar")->ID );
   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");
   ?>

</section>
