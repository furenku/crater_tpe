<?php
/*
Template Name: Autopublicación
*/

get_header();
global $pagina_actual;
global $ID_actual;

$info_paginas = array(
   'Técnicas'=>'01-tecnicas',
   'Talleres / Academia'=>'02-academia',
   'Servicios de Impresión'=>'03-servicios',
);

foreach( $info_paginas as $nombre => $template ) :

   $pagina = get_page_by_title( $nombre );

   $scrollOnLoad = $ID_actual == $pagina->ID ? ' data-scroll_on_load="true "' : '';


?>

<section class="paginas_hijas contenedor_titular_interactivo columns h_a p5" data-scroll_target="<?php echo $pagina->ID; ?>" <?php echo $scrollOnLoad; ?>>

<?php
$pagina_actual = get_page_by_title($nombre);
get_template_part('secciones/04-autopublicacion/'.$template);
?>

</section>

<?php endforeach; ?>


<?php
get_footer();
