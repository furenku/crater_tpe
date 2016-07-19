<?php
global $paginas_informacion;
$paginas_informacion = get_pages(array("parent"=>get_page_by_title("Información")->ID))
?>

<h1 class="p5">
   Información
</h1>

<!-- .row>(.columns.small-6.medium-3>a.h_100.w_100>h4{Título de Sección}+div.imagen.h_50.imgLiquid.imgLiquidFill>img[http://fakeimg.pl/320x240])*4 -->
<div class="row p5">

   <?php foreach ($paginas_informacion as $pagina_informacion ): ?>

      <a href="" class="columns small-6 medium-3 text-center">
         <div class="imagen h_40vh imgLiquid imgLiquidFill">
            <?php echo get_the_post_thumbnail($pagina_informacion->ID,'medium'); ?>
         </div>
         <h4>
            <?php echo apply_filters('the_title', $pagina_informacion->post_title); ?>
         </h4>
      </a>

   <?php endforeach; ?>

</div>
