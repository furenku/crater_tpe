<!-- article.publicacion.small-6.medium-4.large-3.columns -->
<article id="publicacion_<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>" class="publicacion p4">
   <header class="h_15">
      <h5 class="titulo">
         <?php echo apply_filters( 'the_title', get_the_title() ); ?>
      </h5>
   </header>
   <section class="imagen <?php echo $columnas_imagen; ?> h_45 imgLiquid imgLiquidNoFill">
      <?php
      if( has_post_thumbnail() ) {
         echo get_the_post_thumbnail();
      }
      ?>
   </section>
   <div class="producto-texto <?php echo $columnas_texto; ?> h_40 p0">
      <div class="extracto columns h_70 h_sm_40 m0 p3 pl0 pr0 fontM">
            <?php echo apply_filters('the_excerpt', get_the_excerpt()); ?>
      </div>

      <?php if( $mostrar_info_tienda ) : ?>

         <footer class="columns h_30 h_sm_60 text-center">

            <div class="precio columns h_40 fontXL h_a p2">
               <?php echo $precio; ?>
            </div>

            <div class="acciones columns h_60 p2">
               <div class="leer_mas columns small-6">
                  <a href="<?php echo get_the_permalink(); ?>" class="publicacion-leer_mas button columns fontM">
                     Ver más
                  </a>
               </div>
               <div class="comprar  columns small-6">
                  <a href="#" class="publicacion-comprar button columns fontM" data-id="<?php echo get_the_ID(); ?>">
                     Comprar
                  </a>
               </div>
            </div>

         </footer>

      <?php endif; ?>
   </div>

</article>
