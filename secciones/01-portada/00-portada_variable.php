<?php

if( is_page('Inicio') ) {

   get_template_part('secciones/02-inicio/00-portada');

}else if( is_page('Carrito') ) {

   get_template_part('secciones/10-tienda/carrito');

}  else if( is_page('Realizar compra') ) {

   get_template_part('secciones/10-tienda/realizar_compra');

} else if( is_page() ) {
   $parents = get_post_ancestors( get_the_ID() );
   $parent = $parents[0];
   $parent = get_page($parent);
   $parent_titulo =  $parent->post_title ;


   if( $parent_titulo == "Información" || get_the_title() == "Información" ) {
      get_template_part('secciones/03-info/00-portada');
   }
   elseif( $parent_titulo == "Catálogo" || get_the_title() == "Catálogo" ) {
      get_template_part('secciones/05-catalogo/00-portada');
   }
   elseif( $parent_titulo == "Autopublicación" || get_the_title() == "Autopublicación" ) {
      get_template_part('secciones/04-autopublicacion/00-portada');
   }
   else {
      get_template_part('secciones/00-general/page-0-portada');
   }

}
