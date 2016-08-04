<?php
   $imgLiquidFill = is_singular('persona') ? 'imgLiquidNoFill' : 'imgLiquidFill';
   $layout_imagen = is_singular('persona') ? 'medium-6 large-4 h_40vh' : 'h_40vh';
   $layout_extracto = is_singular('persona') ? 'medium-6 large-8 h_40vh' : '';
?>

<article class="columns contenedor_titular_interactivo">

   <header>
      <h1 class="titular_interactivo">
         <?php echo apply_filters('the_title', get_the_title()); ?>
      </h1>


   </header>

   <section class="imagen <?php echo $layout_imagen; ?> columns imgLiquid <?php echo $imgLiquidFill; ?>">
      <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
   </section>

   <section class="extracto <?php echo $layout_extracto; ?> columns mt1 mb1 p5 fontXL">
      <div class="vcenter h_a">
         <?php echo apply_filters('the_excerpt', get_the_excerpt()); ?>
      </div>
   </section>

   <section class="fecha mt1 mb1 text-left fontS">
      <?php echo get_the_date('d\, \d\e F\. Y'); ?>
   </section>

   <section class="contenido mt1 fontL">
      <?php echo apply_filters('the_content', get_the_content()); ?>
   </section>

   <footer class="posts_relacionados columns p5 fontS">
      <?php get_template_part('secciones/00-general/posts_relacionados'); ?>
   </footer>

</article>
