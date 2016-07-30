<?php
global $ID_actual;
global $paginas_hijas;

$pagina_principal = get_page_by_title("Información");
$paginas_hijas = get_pages( array( "parent" => $pagina_principal -> ID ));

?>

<section id="informacion-portada" class="portada rel">
   <div class="imagen fondo w_100 z-1 absUpL imgLiquid imgLiquidFill">
      <?php echo get_the_post_thumbnail($ID,'large'); ?>
   </div>

   <div class="cortina z-1 h_100 w_100 absUpL"></div>

   <div class="columns medium-4 large-2 h_20 h mt2">
         <h1 class="p5 pt0 pl0">
            Información
         </h1>
   </div>
   <div class="contenido columns medium-6 large-7 large-offset-1 end h_a p2 pt0 pb2 mb1 fontXL mt2">
      <?php echo apply_filters( 'the_content', $pagina_principal->post_content ); ?>
   </div>


   <!-- .row>(.columns.small-6.medium-3>a.h_100.w_100>h4{Título de Sección}+div.imagen.h_50.imgLiquid.imgLiquidFill>img[http://fakeimg.pl/320x240])*4 -->
   <div class="columns medium-6 large-12 p5 pt0 h_40vh">

      <?php
      foreach($paginas_hijas as $pagina_hija ):
         $ID = $pagina_hija -> ID;
      ?>



         <div class="columns small-6 large-3  h_100 p5 pt0 text-center rel">
            <a href="<?php echo get_the_permalink( $pagina_hija -> ID ); ?>" class="w_100 h_100" data-scroll_to="<?php echo $ID; ?>">
               <div class="imagen h_50 imgLiquid imgLiquidNoFill">
                  <?php echo get_the_post_thumbnail($pagina_hija->ID,'medium'); ?>
               </div>
               <div class="texto h_50 w_100 pt1">
                  <div class="vcenter h_a text-center w_100">
                     <h4>
                        <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
                     </h4>

                  </div>
               </div>
            </a>
         </div>

      <?php endforeach; ?>

   </div>

</section>
