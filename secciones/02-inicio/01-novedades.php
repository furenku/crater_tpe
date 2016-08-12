<?php
$coleccion = obtener_coleccion("Nuevos", 6, false );
$link_catalogo = get_the_permalink( get_page_by_title("Catálogo")->ID );
?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p5 pt0 pb4 m0 h_80vh">

   <h1 class="titular_interactivo">Nuevas producciones</h1>

   <section id="inicio-novedades" class="slider columns h_100">

   <?php foreach ($coleccion as $producto ) : ?>

      <article id="publicacion_<?php echo $producto['ID']; ?>" class="p3">
         <?php

         $link_publicacion = add_query_arg( 'scrollTo', $producto['ID'], $link_catalogo );
         ?>
         <a href="<?php echo $link_publicacion; ?>">

            <header class="columns h_70">
               <section class="columns imagen h_80 imgLiquid imgLiquidNoFill">
                  <?php echo $producto['imagen']; ?>
               </section>
               <h6 class="titulo h_20 fontS bold">
                  <?php echo $producto['titulo']; ?>
               </h6>
            </header>
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
