<?php

/*

Template Name: Página con Hijas

Plantilla para páginas

- Permite desplegar páginas con páginas "hijas". El contenido de cada una de ellas
se va aumentando, dando una cierta separación visual entre una y otra.

- Las páginas Hijas pueden a su vez tener hijas, que se mostrarían como subdivisiones internas.

- Las páginas hijas pueden contener estructuras HTML

*/


get_header();

global $paginas_hijas;
if( $paginas_hijas )
foreach( $paginas_hijas as $pagina ) {
   mostrar_hijas( $pagina );
}

get_footer();




function mostrar_hijas( $pagina ) {

   $ID = $pagina -> ID;
   $titulo = apply_filters( 'the_title', $pagina -> post_title );
   $contenido = apply_filters( 'the_content', $pagina -> post_content );
   $extracto = apply_filters( 'the_excerpt', $pagina -> post_excerpt );

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

   <article class="columns <?php echo $columnas; ?> p5 h_100 rel">

   <?php

      $heading = 'h' . ( $profundidad + 1 );

      echo '<'.$heading.'>';
         echo $titulo;
      echo '</'.$heading.'>';

   ?>

   <div class="pagina_hija-imagen-extracto p0 m0 <?php echo $profundidad == 2 ? " h_30vh " : ""; ?>">
      <!-- <div class="vcenter h_a p0 "> -->


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
               $tamanno = 'large';
               break;

            default:
               $tamanno = 'medium';
               break;
         }

         $img = get_the_post_thumbnail($pagina->ID, $tamanno );

         if( $img ) :
            $clases_img = "";
            if( $profundidad == 2 ) :
               $clases_img = " imagen_fondo_fx1 absUpL z-1 h_100 w_100 imgLiquid imgLiquidFill";
            else :
               $clases_img = " h_a ";
            endif;

         ?>

            <section class="imagen columns <?php echo $columnas_internas; ?>  p0 text-center <?php echo $clases_img; ?>">
               <?php echo $img; ?>
            </section>

         <?php
         else :

            if( $profundidad == 1 )
               $columnas_internas = "medium-10 large-8 medium-offset-1 large-offset-2 end";

         endif;

         ?>

         <section class="extracto columns <?php echo $columnas_internas; ?> h_a p5">
            <div class="vcenter h_a">
               <?php echo $extracto; ?>
            </div>
         </section>

      <!-- </div> -->
      <!--.vcenter-->
   </div><!--.pagina_hija-imagen-extracto-->


   <?php if($profundidad < 2) : ?>

      <section class="paginas_hijas columns small-12 h_100">

         <?php foreach( $paginas_hijas as $pagina_hija ) {

            mostrar_hijas( $pagina_hija );

         } ?>

      </section>

      <section class="contenido columns h_a p5 medium-10 large-8 medium-offset-1 large-offset-2 end">
         <?php echo $contenido; ?>
      </section>

   <?php else :  ?>

      <a href="<?php echo get_the_permalink($ID); ?>" class="button enlace p5 small-12 columns">
         Ir a página
      </a>

   <?php endif; ?>

   </article>


   <?php


}


?>
