<?php
/*
Template Name: Catálogo
*/

get_header();


global $paginas_hijas;
global $ID_actual;

$loader="";
foreach($paginas_hijas as $pagina):



   if( $pagina->post_title == "Colecciones" ) :
      $template = "01-colecciones";
      $columnas = [3,2,1];
   elseif( $pagina->post_title == "Ediciones Únicas" ) :
      $template = "02-ediciones_unicas";
      $columnas = [4,3,2];
   elseif( $pagina->post_title == "Proyectos" ) :
      $template = "03-proyectos";
      $columnas = [2,1,1];
   endif;

   $identidad = str_replace(" ", "_",strtolower($pagina->post_title));

?>

   <?php $scrollOnLoad = $ID_actual == $pagina->ID ? ' data-scroll_on_load="true "' : ''; ?>

   <section id="catalogo-<?php echo $identidad; ?>" class="scroll_on_load_target catalogo-seccion p5 h_80vh h_sm_90vh mb3" data-scroll_target="<?php echo $pagina->ID; ?>" <?php echo $scrollOnLoad; ?>>

      <div class="columns small-8 medium-9 large-10 h_20 ">

         <h1 class="titulo_principal">
            <?php echo apply_filters('the_title', $pagina->post_title); ?>
         </h1>
      </div>
      <div class="boton-regresar button columns small-4 medium-3 large-2  h_20 op0 fontL color_blanco">
         <div class="columns small-2 text-left p0">
            <div class="vcenter h_a">
               <i class="fa fa-arrow-left fontL"></i>
            </div>
         </div>
         <div class="columns small-10 p2">
            <div class="vcenter h_a">
               Regresar a Colecciones
            </div>
         </div>
      </div>
      <div class="elementos columns h_80" data-columnas="<?php echo json_encode($columnas); ?>">
         <?php
         get_template_part( "secciones/05-catalogo/" . $template );
         ?>
      </div>
   </section>

<?php

endforeach;

get_footer();
