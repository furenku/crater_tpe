<?php
/*
Template Name: Proyectos
*/

get_header();

?>

<div class="columns h_75vh">


<section id="proyectos-listado" class="columns small-4 scrollH p5">

   <h1 class="mb2">
      Proyectos
   </h1>


   <?php

   $args = array( 'post_type' => 'proyecto', 'posts_per_page' => -1 );
   $q = new WP_Query( $args );

   if( $q -> have_posts() ) :
      while ( $q -> have_posts() ) :
         $q -> the_post();
         for ($i=0; $i < 12; $i++) :
         ?>

         <article class="columns small-12 h_a p2 mb1">

            <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">

            <header class="columns h_15 p0 pb1">
               <h4>
                  <?php echo apply_filters('the_title', get_the_title() ); ?>
               </h4>
            </header>

            <section class="imagen columns h_20vh imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail(); ?>
            </section>

            <section class="extracto columns columns h_25 p0 pt1 fontM">
               <?php echo apply_filters('the_excerpt', get_the_excerpt() ); ?>
            </section>

            <section class="participantes columns h_a fontS p0">
               <ul>

               <?php
               for ($j=0; $j < 2; $j++) :
                  ?>
                  <li>
                     <a href="#" class="pr1">
                        Nombre Completo de Persona
                     </a>
                  </li>
                  <?php
               endfor;
               ?>
               </ul>

            </section>

            </a>

         </article>

         <?php
         endfor;
      endwhile;
   endif;
   ?>

</section>



<section id="proyectos-entradas" class="columns small-8 scrollH p5">

   <h1>
      Blog
   </h1>

   <?php

   $args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
   $q = new WP_Query( $args );

   if( $q -> have_posts() ) :
      while ( $q -> have_posts() ) :
         $q -> the_post();
         for ($i=0; $i < 12; $i++) :
         ?>

         <article class="columns small-12 h_a p5 mb1">

            <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">

               <header class="h_a pb1 pl0">
                  <h3>
                     <?php echo apply_filters('the_title', get_the_title() ); ?>
                  </h3>
               </header>
               <section class="imagen columns h_35vh imgLiquid imgLiquidFill">
                  <?php echo get_the_post_thumbnail(); ?>
               </section>

               <section class="texto columns h_40 p0 pt1">

                  <section class="fecha columns h_20 fontS pl0">
                     Publicada el <?php echo get_the_date('d \d\e F\, Y', get_the_ID() ); ?>
                  </section>

                  <section class="extracto columns h_80 fontML pl0 pt1">
                     <?php echo apply_filters('the_excerpt', get_the_excerpt() ); ?>
                  </section>

               </section>


            </a>

         </article>

         <?php
         endfor;
      endwhile;
   endif;
   ?>
</section>


</div>

<?php

get_footer();
