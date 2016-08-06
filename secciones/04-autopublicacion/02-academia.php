<?php

global $pagina_actual;
global $product_cat;
global $texto_boton;

$args = array( 'post_type' => 'taller', 'posts_per_page' => -1 );
$q = new WP_Query( $args );

?>

<section class="paginas_hijas contenedor_titular_interactivo columns h_a p5">

   <h1 class="titular_interactivo">
      <?php echo apply_filters('the_title', $pagina_actual->post_title); ?>
   </h1>

   <?php
   if($q ->  have_posts() ) :
      while ( $q -> have_posts() ) :
         $q -> the_post();
         for ($i=0; $i < 6; $i++) :
            ?>

            <article class="columns medium-6 h_45vh p3 mb2">
               <div class="columns p0">

                  <div class="imagen columns small-4 h_45 imgLiquid imgLiquidFill">
                     <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
                  </div>

                  <div class="texto columns small-8 h_45 p2">
                     <header class="columns h_20 p3 pt0">
                        <h5 class="bold">
                           <?php echo apply_filters( 'the_title', get_the_title() ); ?>
                        </h5>
                     </header>

                     <section class="content columns h_80 p3">
                        <div class="vcenter h_a">
                           <?php echo apply_filters( 'the_excerpt', get_the_excerpt() ); ?>
                        </div>
                     </section>
                  </div>

                  <footer class="columns h_55 p0">

                     <section class="info columns h_70 p2 fontM ">
                        <div class="fechas columns h_30  p2  ">
                           Del 12 de septiembre al 22 de octubre, 2016.
                        </div>
                        <div class="horario columns h_30 p2 pt0  fontS">
                           Martes de 12:00pm a 3:00pm y Jueves de 4:00pm a 7:00pm.
                        </div>
                        <div class="lugar columns h_40 p0 ">
                           <div class="link_espacio columns small-6 p0">
                              <a href="#" class="w_100 h_100 p2 m0 ">
                                 <span class="f_l pr1 w_a h_a m0 p0  extrabold font1">
                                    Nombre del Espacio
                                 </span>
                                 <i class="f_l w_a m0 p0 h_a fa fa-external-link fontS p1 pl0"></i>


                              </a>
                           </div>
                           <div class="direccion columns small-6 text-justify fontS p1 pr0">
                              <div class="columns small-2 text-center p2 pl0">
                                 <i class=" fa fa-map-marker fontL "></i>
                              </div>
                              <div class="columns small-10 p0  fontXS bold">
                                 Nombre de la Calle #666. Nombre de Colonia. Nombre de Ciudad.
                              </div>
                           </div>
                        </div>
                     </section>

                     <div class="columns h_25 p0 color_blanco  ">
                        <div class="costo columns small-4 p3 ">
                           <div class="vcenter h_a extrabold font1">
                              Costo: <span class="costo extrabold font1">$666</span>
                           </div>
                        </div>
                        <div class="cupo columns small-4 p3">
                           <div class="vcenter h_a extrabold font1">
                              <span class="cupo extrabold font1">12</span> asistentes.
                           </div>
                        </div>
                        <div class="columns small-4 p0 text-right">

                           <a class="button h_100 p2 color_terciario_bg color_primario_hover_bg  m0 extrabold font1">
                              <div class="vcenter h_a fontM extrabold color_blanco ">
                                 Reservar lugares
                              </div>
                           </a>

                        </div>
                     </div>
                  </footer>

               </div>
            </article>
            <?php
         endfor;
      endwhile;
   endif;

   ?>

</section>
