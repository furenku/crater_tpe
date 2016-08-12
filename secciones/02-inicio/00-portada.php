<?php
$inicio = get_page_by_title("Inicio");
?>
<section id="inicio-portada" class="columns h_70vh p0 m0 rel">

   <div class="w_100 h_100 abs z-1 imgLiquid imgLiquidFill">
      <?php echo get_the_post_thumbnail( $inicio->ID, 'full' ); ?>
   </div>
   <!-- <div class="cortina_oscura w_100 h_100 abs z-1"></div> -->

   <div class="columns columns medium-9 large-10 end h_100 reñ">
      <div class="columns medium-6 p5">
         <div class="vcenter h_a text-center">
            <h1 id="inicio-portada-nombre_sitio" class="fontXXXL mb1 color_blanco txsh1">
               <?php echo bloginfo( 'name' ); ?>
            </h1>
         </div>
      </div>
      <div class="columns medium-6 p0">
         <div class="vcenter columns h_a p0">
            <h2 id="inicio-portada-nombre_sitio" class="columns p0 mb2 color_blanco txsh1 text-center">
               <?php echo bloginfo( 'description' ); ?>
            </h2>
            <div class="contenido columns h_a p0 pr1 text-left fontL color_blanco color_negro_bg p5 pt1 pb1">
               <?php echo apply_filters('the_content', $inicio->post_content ); ?>
            </div>
            <div class="columns pt2 text-center">
               <div id="inicio-portada-ver-mas" class="button">
                  <h6>Ver más</h6>
                  <span class="fa fa-caret-down fontXL"></span>
               </div>
            </div>
         </div>
      </div>

   </div>


</section>
