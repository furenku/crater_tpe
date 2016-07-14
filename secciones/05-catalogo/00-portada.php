<?php

// Catálogo
global $paginas_catalogo;
$paginas_catalogo = get_pages( array( 'child_of' => get_page_by_title("Catálogo")->ID ) );


?>

<section id="catalogo-introduccion" class="p5 h_30vh">
   <div class="columns medium-6 large-7 p5">
      <h1 class="m0 p0">Catálogo</h1>
   </div>
   <div class="columns medium-6 large-5 p5">
      <div class="vcenter">
         <p class="fontL">
            <?php echo apply_filters('the_content', get_page_by_title("Catálogo")->post_content); ?>
         </p>
      </div>
   </div>

</section>
<div id="catalogo-enlaces" class="p5">

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
         <h5 class="p5 pb0"><?php echo $titulo; ?></h5>
         <span class="extracto fontXS p5 pt0 text-left"><?php echo $texto; ?></span>
      </div>

   </div>


   <?php endforeach; ?>

</div>
