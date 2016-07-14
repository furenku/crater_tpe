<?php

// Catálogo
global $paginas_catalogo;
$paginas_catalogo = get_pages( array( 'child_of' => get_page_by_title("Catálogo")->ID ) );


?>

<h1 class="p5">Catálogo</h1>

<div id="catalogo-enlaces" class="mt2 p5">

   <?php foreach( $paginas_catalogo as $pagina ) :
      $ID = $pagina -> ID;
      $titulo = apply_filters('the_title', $pagina -> post_title );
      $texto = apply_filters('the_excerpt', $pagina -> post_content );
      $link = get_the_permalink( $ID );
   ?>
   <div class="columns medium-4 h_a p3 p_lg_5 text-center">

      <div class="boton-scroll button p p3 p_lg_5 5 color_blanco_bg color_primario_hover_bg color_negro color_blanco_hover" data-scroll_to="<?php echo $ID; ?>">
         <div class="imagen h_25vh imgLiquid imgLiquidFill">
            <?php echo get_the_post_thumbnail( $ID ); ?>
         </div>
         <h3 class="p5"><?php echo $titulo; ?></h3>
         <p class="extracto fontM"><?php echo $texto; ?></p>
      </div>

   </div>


   <?php endforeach; ?>

</div>
