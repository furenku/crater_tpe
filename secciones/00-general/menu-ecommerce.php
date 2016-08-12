<?php
global $woocommerce;
?>
<nav id="ecommerce-nav">
   <ul>

      <a href="<?php echo WC()->cart->get_cart_url(); ?>">

         <li id="ecommerce-nav-carrito" class="columns medium-5 fontS">
            <div class="etiqueta columns small-6">
               Carrito
            </div>
            <div id="ecommerce-nav-carrito-cantidad" class="cantidad columns small-1 p1 fontXXS bold">
               (<span class="cantidad"><?php echo $woocommerce->cart->get_cart_contents_count; ?></span>)
            </div>
            <div id="ecommerce-nav-carrito-total" class="total columns small-3 p1 fontXXS bold">
               <?php echo $woocommerce->cart->get_cart_total; ?>
            </div>
         </li>
      </a>



      <?php
      #if ( $woocommerce->cart->get_cart_contents_count > 0 ) :
      ?>
      <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">
         <li class="columns medium-5 fontS">
            Realizar compra
         </li>
      </a>
      <?php #endif; ?>



      <a href="#">
         <li class="columns medium-2 fontS">
            <div class="fa fa-user fontM"></div>
         </li>
      </a>

   </ul>
</nav>
