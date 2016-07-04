<?php

/*

Plantilla para páginas

- Permite desplegar páginas con páginas "hijas". El contenido de cada una de ellas
se va aumentando, dando una cierta separación visual entre una y otra.

- Las páginas Hijas pueden a su vez tener hijas, que se mostrarían como subdivisiones internas.

- Las páginas hijas pueden contener estructuras HTML

*/


get_header();

global $paginas_hijas;

foreach( $paginas_hijas as $pagina ) {
   mostrar_hijas( $pagina );
}

get_footer();




function mostrar_hijas( $pagina ) {

   $ID = $pagina -> ID;
   $titulo = apply_filters( 'the_title', $pagina -> post_title );
   $contenido = apply_filters( 'the_content', $pagina -> post_content );

   $profundidad = 0;

   $revisar_padre = $pagina;

   $tiene_padres = $revisar_padre->post_parent != 0;

   while( $tiene_padres ) {
      $profundidad++;
      $revisar_padre = get_post( $revisar_padre->post_parent );
      $tiene_padres = $revisar_padre -> post_parent != 0;
   }

   $columnas = "";

      // $extracto = apply_filters( 'the_excerpt', get_the_excerpt() );

   $paginas_hijas = get_pages( array( 'child_of' => $ID, 'parent' => $ID ) );

   $paginas_hermanas = get_pages(
      array(
         'child_of' => $pagina->post_parent,
         'parent' => $pagina->post_parent
      )
   );


   if( $profundidad == 2 ) {

      if( count( $paginas_hermanas ) == 2 ) {
         $columnas = "medium-6";
      }
      if( count( $paginas_hermanas ) == 3 ) {
         $columnas = "medium-4";
      }

   }
   ?>

   <article class="columns <?php echo $columnas; ?> p5">

   <?php

      $heading = 'h' . ( $profundidad + 1 );

      echo '<'.$heading.'>';
         echo $titulo;
      echo '</'.$heading.'>';

   ?>


   <?php

   $columnas_internas = "";

   switch ($profundidad) {
      // case 0:
      //
      //    $tamanno = 'full';
      //
      //    break;
      case 1:
         $columnas_internas = "medium-6";
         $tamanno = 'large';
         break;
      case 2:
         $tamanno = 'medium';
         break;

      default:
         $tamanno = 'thumb';
         break;
   }

   $img = get_the_post_thumbnail($pagina->ID, $tamanno );

   if( $img ) {
   ?>

      <section class="imagen p0 text-center columns <?php echo $columnas_internas; ?>">
         <?php echo $img; ?>
      </section>

   <?php
   } else {
      if( $profundidad == 1 )
         $columnas_internas = "medium-8 medium-offset-2 end";
   }

   ?>

   <section class="contenido p5 columns <?php echo $columnas_internas; ?>">
      <?php echo $contenido; ?>
   </section>


   </article>

   <section id="paginas_hijas">


         <?php

         foreach( $paginas_hijas as $pagina_hija ) {

            mostrar_hijas( $pagina_hija );

         }

         ?>

   </section>

   <?php


}


?>
