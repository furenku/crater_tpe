<?php
/*
Template Name: Suscripción
*/

get_header();

?>

<section id="suscripciones-introduccion" class="columns h_30 p5">

   <h1>¿Cómo funciona?</h1>

   <div class="introduccion columns medium-10 large-8  end p0  pt2  pb1 fontL">
      <?php echo apply_filters( 'the_content', get_the_content() ); ?>
   </div>

</section>


<section id="suscripciones-productos">

   <?php for ($i=0; $i < 3; $i++) { ?>

   <article class="suscripcion columns medium-6 large-4 p2">
      <h3>Nombre de la Suscripción</h3>

      <div class="imagen h_25vh imgLiquid imgLiquidFill mb1">
         <img src="http://fakeimg.pl/300x200" alt="" />
      </div>

      <div class="extracto columns fontL p2">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde.</p>
         <p>Expedita odit, at quo esse quae est veniam pariatur.</p>
      </div>

      <div class="precio_periodo columns  p4 pt0">
         <div class="precio columns text-center fontXL color_primario bold">
            $666.66
         </div>
         <div class="periodo columns text-center ">
            anuales
         </div>
      </div>

      <a href="" class="suscripcion-adquirir button w_100 p4">
         Adquirir
      </a>

   </article>

   <?php } ?>

</section>


<section id="suscripciones-informacion" class="columns mt2 pb1">

   <?php get_template_part('secciones/10-tienda/informacion'); ?>

</section>

<?php

get_footer();
