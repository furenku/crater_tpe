<?php
/*
Template Name: Inicio
*/

get_header();

global $pagina_a_cargar;
$pagina_a_cargar = get_query_var('pagina_a_cargar');

get_template_part("secciones/02-inicio/01-informacion");

get_template_part("secciones/02-inicio/02-catalogo");

get_template_part("secciones/02-inicio/03-autopublicacion");

get_template_part("secciones/02-inicio/04-proyectos");

get_template_part("secciones/02-inicio/05-suscripciones");

get_template_part("secciones/02-inicio/07-donde-comprar");

get_template_part("secciones/02-inicio/08-contacto");


get_footer();
