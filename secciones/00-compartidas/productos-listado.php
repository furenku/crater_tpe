<?php

global $product_cat;
global $texto_boton;


if( $texto_boton == "" ) {
   $texto_boton = "Comprar";
}
$q = new WP_Query( array(
   'post_type' => 'product',
   'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $product_cat->term_id
		),
	),

) );

if($q->have_posts()):

   while($q->have_posts()):

      $q->the_post();


      $precio = 0;
      $precio = get_post_meta(get_the_ID(),'_sale_price',true);
      if( $precio == "" || ! $precio  ) {
         $precio = get_post_meta(get_the_ID(),'_regular_price',true);
      }

      $precio = get_woocommerce_currency_symbol() . $precio;

      ?>

      <!-- article.publicacion.small-6.medium-4.large-3.columns -->
      <article id="publicacion_<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>" class="publicacion small-12 medium-6 large-4 columns p5 h_60vh h_sm_70vh mb2">
         <header class="h_30 h_sm_20">
            <h6 class="">
               <?php echo apply_filters( 'the_title', get_the_title() ); ?>
            </h6>
            <div class="autor fontXXS h_a">
               Nombre de de Autor 1, Nombre de de Autor 2, Nombre de de Autor 3
            </div>
         </header>
         <section class="imagen h_30 h_sm_30 h_sm_30vh imgLiquid imgLiquidNoFill">
            <?php
            if( has_post_thumbnail() ) {
               echo get_the_post_thumbnail();
            }
            ?>
         </section>
         <section class="extracto columns h_20 h_sm_20 m0 p0">
            <div class="vcenter">
               <p class="fontXXS mb0">
                  <?php echo  get_the_excerpt(); ?>
               </p>
            </div>
         </section>
         <footer class="text-center h_20 h_sm_30">
            <div class="precio columns fontL h_a p2">
               <?php echo $precio; ?>
            </div>
            <div class="acciones columns h_a">
               <div class="leer_mas columns small-6 h_a">
                  <a href="<?php echo get_the_permalink(); ?>" class="publicacion-leer_mas button hollow fontXS">
                     Leer más
                  </a>
               </div>
               <div class="comprar columns small-6 h_a">
                  <a href="#" class="publicacion-comprar button hollow fontXS" data-id="<?php echo get_the_ID(); ?>">
                     <?php echo $texto_boton; ?>
                  </a>
               </div>
            </div>
         </footer>

      </article>

      <?php

   endwhile;

endif;

?>
