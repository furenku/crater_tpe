<?php
global $woocommerce;
?>
<nav id="ecommerce-nav">
   <ul>

      <a href="<?php echo WC()->cart->get_cart_url(); ?>">

         <li id="ecommerce-nav-carrito" class="columns medium-3 fontXXS">
            <div class="etiqueta columns small-6">
               Carrito
            </div>
            <div id="ecommerce-nav-carrito-cantidad" class="cantidad columns small-2">
               <?php echo $woocommerce->cart->get_cart_contents_count; ?>
            </div>
            <div id="ecommerce-nav-carrito-total" class="total columns small-3">
               <?php echo $woocommerce->cart->get_cart_total; ?>
            </div>
         </li>
      </a>



      <?php
      #if ( $woocommerce->cart->get_cart_contents_count > 0 ) :
      ?>
      <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">
         <li class="columns medium-3 fontXXS">
            Realizar compra
         </li>
      </a>
      <?php #endif; ?>



      <a href="#">
         <li class="columns medium-3 fontXXS">
            Mi cuenta
         </li>
      </a>

      <a href="#">
         <li class="columns medium-3 fontXXS">
            Salir/Registrarse
         </li>
      </a>

   </ul>
</nav>
