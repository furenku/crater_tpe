<?php
get_header();
global $is_ecommerce;
?>

<div class="section contenido p5 p_md_2 rel">

   <?php if( $is_ecommerce ) : ?>
      <div class="contenedor_titular_interactivo columns p0">

         <h1 class="titular_interactivo">
            <?php echo apply_filters('the_title', get_the_title()); ?>
         </h1>

         <?php
         if( is_page('Realizar compra') ) :
            ?>
            <div class="columns medium-6 p5 p_md_2">
               <?php get_template_part('woocommerce/form-billing'); ?>
            </div>
            <div class="columns medium-6 p5 p_md_2">
               <?php get_template_part('woocommerce/form-checkout'); ?>
            </div>
            <?php
         elseif( is_page('Carrito') ) :
            get_template_part('woocommerce/cart');
         endif;
         ?>

      </div>
      <?php endif; ?>

   <div class="columns medium-10 medium-offset-1 large-8 large-offset-2 fontL">
      <?php echo apply_filters('the_content', get_the_content()); ?>
   </div>
</div>


<?php
get_footer();
?>
