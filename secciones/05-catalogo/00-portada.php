<?php

// Catálogo
global $paginas_hijas;
$pagina_principal = get_page_by_title("Catálogo");

$paginas_hijas = get_pages( array( 'child_of' => $pagina_principal->ID ) );


?>


<section id="catalogo-portada" class="portada h_100vh rel p5">

   <div class="imagen fondo w_100 z-1 absUpL imgLiquid imgLiquidFill">
      <?php echo get_the_post_thumbnail($ID,'large'); ?>
   </div>

   <div class="columns medium-4 large-2 h_20 h mt2">
         <h1 class="p5 pt0 pl0">
            Catálogo
         </h1>
   </div>
   <div class="contenido columns medium-6 large-7 large-offset-1 end h_a p2 pt0 pb2 mb1 fontXL mt2">
      <?php echo apply_filters( 'the_content', $pagina_principal->post_content ); ?>
   </div>



   <!-- .row>(.columns.small-6.medium-3>a.h_100.w_100>h4{Título de Sección}+div.imagen.h_50.imgLiquid.imgLiquidFill>img[http://fakeimg.pl/320x240])*4 -->
   <div class="columns medium-6 large-12 p5 pt0 h_40vh">

      <?php foreach( $paginas_hijas as $pagina_hija ) :
         $ID = $pagina_hija -> ID;
         $titulo = apply_filters('the_title', $pagina_hija -> post_title );
         $texto = apply_filters('the_excerpt', $pagina_hija -> post_excerpt );
         $link = get_the_permalink( $ID );
         ?>
         <div class="columns medium-4 h_50vh p5 p_lg_5 text-center rel ">

            <div class="p5 rel">
               <div class="boton-scroll button p p3 p_lg_5 5 color_blanco_bg color_primario_hover_bg color_negro color_blanco_hover" data-scroll_to="<?php echo $ID; ?>">
                  <div class="imagen absUpL w_100 imgLiquid imgLiquidFill z0">
                     <?php echo get_the_post_thumbnail( $ID ); ?>
                  </div>
                  <!-- <div class="cortina z1 h_100 w_100 absUpL"></div> -->

                  <div class="texto absUpL z1 p5">
                     <div class="vcenter h_a">
                        <h5 class="p5 fontXL m0"><?php echo $titulo; ?></h5>
                        <div class="extracto fontL ls2 p5 pt0 pr2 text-center"><?php echo $texto; ?></div>
                     </div>
                  </div>
               </div>

            </div>
         </div>


      <?php endforeach; ?>

   </div>

</section>
