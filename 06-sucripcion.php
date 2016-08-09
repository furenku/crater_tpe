<?php
/*
Template Name: Suscripción
*/

get_header();

?>

<section id="suscripciones-introduccion h_30">

   <h1>¿Cómo funciona?</h1>

   <div class="introduccion columns p5">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam temporibus veritatis iure odio aliquid tenetur.</p>
      <p>Provident ipsa delectus asperiores eius, cupiditate facere id laboriosam consectetur impedit perferendis, quas suscipit nisi!</p>
   </div>

</section>


<section id="suscripciones-introduccion">

   <?php for ($i=0; $i < 3; $i++) { ?>

   <div class="suscripcion columns medium-6 large-4 p5">
      <h4>Nombre de la Suscripción</h4>

      <div class="imagen h_25vh imgLiquid imgLiquidFill">
         <img src="http://fakeimg.pl/300x200" alt="" />
      </div>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse sit iure quam rem placeat!</p>

      <h5>$666.66</h5>

      <a href="" class="suscripcion-adquirir button">
         Adquirir
      </a>
   </div>

   <?php } ?>

</section>

<?php

get_footer();
