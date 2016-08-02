<?php
/*
Template Name: Autopublicación
*/

get_header();
global $pagina_actual;

$pagina_actual = get_page_by_title('Técnicas');
get_template_part('secciones/04-autopublicacion/01-tecnicas');

$pagina_actual = get_page_by_title('Talleres / Academia');
get_template_part('secciones/04-autopublicacion/02-academia');

$pagina_actual = get_page_by_title('Servicios de Impresión');
get_template_part('secciones/04-autopublicacion/03-servicios');

get_footer();
