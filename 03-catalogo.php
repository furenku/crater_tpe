<?php
/*
Template Name: Catálogo
*/

get_header();


global $paginas_catalogo;

foreach($paginas_catalogo as $pagina):
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

?>

   <section id="catalogo-<?php echo $pagina->ID; ?>" class="catalogo-seccion p5 h_90vh" data-scroll_target="<?php echo $pagina->ID; ?>">
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
