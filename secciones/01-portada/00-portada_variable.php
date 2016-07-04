
<?php

if( is_page('Inicio') ) {
   echo "Inicio";
}

if( is_page('Catálogo') ) {
   get_template_part('secciones/05-catalogo/00-portada');
}

if( is_page() ) {
   get_template_part('secciones/00-general/page-0-portada');
}
