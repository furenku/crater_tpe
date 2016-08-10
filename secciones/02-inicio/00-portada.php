<?php
$inicio = get_page_by_title("Inicio");
?>
<section id="inicio-portada" class="h_100vh">

   <div class="w_100 h_100vh abs z-1 imgLiquid imgLiquidFill">
      <?php echo get_the_post_thumbnail( $inicio->ID, 'full' ); ?>
   </div>

   <div class="columns medium-8 large-8 medium-offset-1 large-offset-2 vcenter h_a text-center end">
      <h1 id="inicio-portada-nombre_sitio" class="fontHuge mb3 color_blanco txsh">
         <?php echo bloginfo( 'name' ); ?>
      </h1>
      <h1 id="inicio-portada-nombre_sitio" class="mb3 color_blanco txsh">
         <?php echo bloginfo( 'description' ); ?>
      </h1>
      <div class="contenido text-left fontXL color_blanco">
         <?php echo apply_filters('the_content', $inicio->post_content ); ?>
      </div>

   </div>

   <div class="w_100 h_20vh absDownL text-center">

      <div class="vcenter h_a">

         <div id="inicio-portada-ver-mas" class="button hollow">
            <h6>Ver más</h6>
            <span class="fa fa-caret-down fontXL"></span>
         </div>

      </div>
   </div>

</section>
