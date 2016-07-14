<?php
/*
Template Name: Catálogo
*/

get_header();


global $paginas_catalogo;

foreach($paginas_catalogo as $pagina):

?>

   <section id="catalogo-<?php echo $pagina->ID; ?>" class="p5 h_90vh" data-scroll_target="<?php echo $pagina->ID; ?>">
      <h1>
         <?php echo apply_filters('the_title', $pagina->post_title); ?>
      </h1>
      <div class="elementos">
         elementos...

      </div>
   </section>

<?php
endforeach;

get_footer();
