<?php
$coleccion = obtener_coleccion("Nuevos", 6, false );
$link_catalogo = get_the_permalink( get_page_by_title("Catálogo")->ID );
?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p5 pt2 pb4 m0 h_80vh">

   <h1 class="titular_interactivo">Nuevas producciones</h1>

   <section id="inicio-novedades" class="slider columns h_100">

   <?php foreach ($coleccion as $producto ) : ?>

      <article id="publicacion_<?php echo $producto['ID']; ?>" class="p3">
         <?php

         $link_publicacion = add_query_arg( 'scrollTo', $producto['ID'], $link_catalogo );
         ?>
         <a href="<?php echo $link_publicacion; ?>">

            <header class="columns h_25">
               <div class="vcenter h_a">
                  <h6 class="titulo fontS bold">
                     <?php echo $producto['titulo']; ?>
                     La insoportable levedad del ser: Consejos para desempleados
                  </h6>
               </div>
            </header>
            <section class="columns imagen h_45 imgLiquid imgLiquidNoFill">
               <?php echo $producto['imagen']; ?>
            </section>
            <div class="columns producto-texto h_30 p0">
               <div class="extracto columns h_70 h_sm_40 m0 p3 pl0 pr0 fontS">
                  <?php echo $producto['extracto']; ?>
               </div>

            </div>

         </a>
      </article>


   <?php endforeach; ?>

   </section>



</section>
