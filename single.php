   <?php
   get_header();
   if( have_posts() ) :
      while ( have_posts() ) :

         the_post(); ?>

         <section id="single_<?php echo get_the_ID();?>" class="columns p5 h_a">

            <?php get_template_part('secciones/00-general/single'); ?>

         </section>


         <script type="text/javascript">

            $(window).trigger('resize');

         </script>
         <?php

      endwhile;
   endif;

   get_footer();
