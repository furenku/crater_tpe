<div class="row expanded">
   <h1>Productos de prueba</h1>

   <?php for ($i=0; $i < 6; $i++) : ?>

      <!-- article.publicacion.small-6.medium-4.large-3.columns -->
      <article id="publicacion_<?php echo 0; ?>" data-id="0" class="publicacion small-12 medium-6 large-4 columns p5 h_60vh h_sm_70vh mb2">
         <header class="h_30 h_sm_20">
            <h6 class="">Nombre Completo de Publicación con más de Ocho Palabras</h6>
            <div class="autor fontXXS h_a">
               Nombre de de Autor 1, Nombre de de Autor 2, Nombre de de Autor 3
            </div>
         </header>
         <section class="imagen h_30 h_sm_30 h_sm_30vh imgLiquid imgLiquidNoFill">
            <img src="http://fakeimg.pl/300x200" alt="" />
         </section>
         <section class="extracto columns h_20 h_sm_20 m0 p0">
            <div class="vcenter">
               <p class="fontXXS mb0">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam est debitis, officiis?
               </p>
            </div>
         </section>
         <footer class="text-center h_20 h_sm_30">
            <div class="precio columns fontXL h_a">
               $999.99
            </div>
            <div class="comprar columns h_a">
               <a href="#" class="publicacion-comprar button hollow">
                  Comprar
               </a>
            </div>
         </footer>
      </article>

   <?php endfor; ?>

</div>
