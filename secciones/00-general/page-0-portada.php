<?php

global $paginas_hijas;

$paginas_hijas = get_pages( array( 'child_of' => $post->ID, 'parent' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );

?>

<section id="page-portada" class="columns h_70vh rel mt0">


   <div id="page-portada-contenido" class="w_100vw absUpL z1 imgLiquid imgLiquidFill h_100">

      <header class="h_30">
         <div class="vcenter h_a">
            <h1 class="m0 p5 color_blanco">
               <?php echo apply_filters( 'the_title', $post->post_title ); ?>
            </h1>
         </div>
      </header>

      <section class="contenido h_50 p5 columns medium-6">
         <div class="vcenter h_a pl0 pr4 fontXL color_blanco">
            <?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
         </div>
      </section>

      <section class="h_50 columns medium-6">

         <?php

         if( is_array( $paginas_hijas )  ) :
            if( count( $paginas_hijas > 1 ) ) :

               ?>

               <nav class=" vcenter columns h_a">

                  <?php

                  foreach( $paginas_hijas as $pagina_hija ) :

                     ?>

                     <div class="h_a p5">
                        <a href="<?php echo get_the_permalink( $pagina_hija -> ID ); ?>" class="w_100 h_100">
                           <?php echo apply_filters( 'the_title', $pagina_hija->post_title ); ?>
                        </a>
                     </div>

                     <?php

                  endforeach;

                  ?>

                  <!-- </div> -->
               </nav>

               <?php

            endif;
         endif;

         ?>

      </section>

   </div>

   <div id="page-portada-fondo" class="w_100vw absUpL z-1 imgLiquid imgLiquidFill h_100   ">
      <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
   </div>


</section>
