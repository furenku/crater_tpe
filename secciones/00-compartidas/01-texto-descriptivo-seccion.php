<?php
   $pagina_a_cargar = get_query_var('pagina_a_cargar');
   $pagina = get_page( $pagina_a_cargar );
?>

<div id="texto-descriptivo-contenedor" class="small-12 columns mt1 mb1 p5 h_20vh h_sm_25 h_md_20">

   <div id="texto-descriptivo-texto" class="columns small-9 p0 text-left">

      <div class="extracto small-12 vcenter fontXL font_md_M font_sm_S">
         <?php echo apply_filters( 'the_excerpt', $pagina->post_excerpt ); ?>
      </div>

   </div>

   <div id="texto-descriptivo-boton" class="columns small-3  p0 align-center">
      <div class="vcenter h_a text-center">
         <a href="<?php echo get_the_permalink( $pagina->ID ); ?>" class="button hollow p4 fontL font_sm_M">
            Ir a <?php echo apply_filters('the_title', $pagina->post_title ); ?>
         </a>
      </div>
   </div>


</div>
