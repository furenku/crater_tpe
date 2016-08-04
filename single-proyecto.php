<?php
get_header();
if( have_posts() ) :
   while ( have_posts() ) :

      the_post();

      ?>

      <section id="single_<?php echo get_the_ID();?>" class="columns medium-8 large-9 p5 h_a">


         <article class="columns contenedor_titular_interactivo">

            <header>
               <h1 class="titular_interactivo">
                  <?php echo apply_filters('the_title', get_the_title()); ?>
               </h1>

               <section class="imagen columns h_40vh imgLiquid imgLiquidFill">
                  <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
               </section>

               <section class="posts_relacionados columns p5 fontS">
                  <?php get_template_part('secciones/00-compartidas/posts_relacionados'); ?>
               </section>

            </header>


            <section class="fecha mt1 mb1 text-left fontS">
               <?php echo get_the_date('d\, \d\e F\. Y'); ?>
            </section>
            <section class="extracto mt1 mb1 fontM">
               <?php echo apply_filters('the_excerpt', get_the_excerpt()); ?>
            </section>
            <section class="contenido mt1 fontL">
               <?php echo apply_filters('the_content', get_the_content()); ?>
            </section>

         </article>

      </section>

      <?php

      endwhile;
   endif;

   ?>

      <aside id="proyecto-blog" class="columns medium-4 large-3 p5">

         <?php

         $q = new WP_Query( $args);
         if( $q->have_posts() ) {
            while ( $q->have_posts() ) {
               $q->the_post();
               ?>

                        <article class="columns p5">

                           <header>
                              <h5 class="">
                                 <?php echo apply_filters('the_title', get_the_title()); ?>
                              </h5>
                           </header>
                           <section class="imagen columns h_30vh imgLiquid imgLiquidFill">
                              <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                           </section>

                           <section class="fecha mt1 mb1 text-left fontXS">
                              <?php echo get_the_date('d\, \d\e F\. Y'); ?>
                           </section>
                           <section class="extracto mt1 mb1 fontS">
                              <?php echo apply_filters('the_excerpt', get_the_excerpt()); ?>
                           </section>

                        </article>

               <?php
            }
         } else {
            /* No posts found */
         }
          ?>

      </aside>

      <script type="text/javascript">

         $(window).trigger('resize');

      </script>
      <?php

get_footer();
