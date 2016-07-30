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

   <section id="catalogo-<?php echo $identidad; ?>" class="scroll_on_load_target catalogo-seccion p5 h_70vh h_sm_90vh mb3" data-scroll_target="<?php echo $pagina->ID; ?>" <?php echo $scrollOnLoad; ?>>
      <h1>
         <?php echo apply_filters('the_title', $pagina->post_title); ?>
      </h1>
      <div class="elementos" data-columnas="<?php echo json_encode($columnas); ?>">
         <?php
         get_template_part( "secciones/05-catalogo/" . $template );
         ?>
      </div>
   </section>

<?php

endforeach;

get_footer();
