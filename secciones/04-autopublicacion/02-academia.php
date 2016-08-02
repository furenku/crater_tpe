<?php

global $pagina_actual;
global $product_cat;
global $texto_boton;

$product_cat = get_term_by('name', 'Talleres', 'product_cat');
$texto_boton = "Reservar lugar";

$taxonomy     = 'product_cat';
$parent       = get_term_by( 'name', 'Talleres', 'product_cat' )->term_id;
$orderby      = 'ASC';
$show_count   = 1;
$pad_counts   = 0;
$hierarchical = 1;
$title        = '';
$empty        = 1;

$args = array(
   'taxonomy'     => $taxonomy,
   'parent'       => $parent,
   'child_of'     => $parent,
   'orderby'      => $orderby,
   'show_count'   => $show_count,
   'pad_counts'   => $pad_counts,
   'hierarchical' => $hierarchical,
   'title_li'     => $title,
   'hide_empty'   => $empty,
);

$all_categories = get_categories( $args );

?>

<h1>
   <?php echo apply_filters('the_title', $pagina_actual->post_title); ?>
</h1>

<section class="columns paginas_hijas h_a p5">

   <?php get_template_part("secciones/00-compartidas/productos-listado"); ?>


</section>
