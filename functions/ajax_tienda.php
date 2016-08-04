<?php



add_action( 'wp_ajax_show_cart', 'show_cart' );
add_action( 'wp_ajax_nopriv_show_cart', 'show_cart' );

function show_cart() {


	$html = "";



	$cart_items_list = WC() -> cart -> get_cart();

	$cart_items_info = array();



	$html = '<ol>';
	foreach( $cart_items_list as $cart_item ) {
		$product = get_post( $cart_item['product_id'] );
		array_push( $cart_items_info,
			array(
				'name' => $product -> post_title,
				'subtotal' => money_format('%(#10n', $cart_item['line_subtotal'] ),
					'subtotal_tax' => money_format('%(#10n', $cart_item['line_subtotal_tax'] )
						) );

		$html .= '<li class="pt1 p_sm_1"><div class="col-xs-7 col-md-8 col-lg-9 font_sm_S font_md_M font_lg_L text-left">';

		$html .= $cart_item['quantity'] . " ";

		$html .= apply_filters( 'the_title', $product -> post_title );
		$html .= '</div>';

		$html .= '<div class="cart_item_price col-xs-5 col-md-4 col-lg-3 font_sm_S font_md_M font_lg_L text-right">';
		$html .= money_format( '%(#10n', $cart_item['line_subtotal'] );
		$html .= '</div></li>';

	}
	$html .= '</ol>';



	$html = '<div id="cart_contents" class="row">' . $html . '</div>';


	$subtotal_ex_tax = WC()->cart->subtotal_ex_tax;


	$gratuity = ( $subtotal_ex_tax ) * 0.18;


	WC()->cart->add_fee( "Gratuity", $gratuity, $taxable = false, $tax_class = '' );



	$html .= '<li id="checkout_gratuity"><div class="p0 font_sm_S font_md_M col-xs-7 col-md-8 col-lg-9 text-left">';
	$html .= 'Gratuity 18%*:';
	$html .= '</div>';

	$html .= '<div class="cart_item_price col-xs-5 font_sm_S font_md_M col-md-4 col-lg-3 text-right">';
	$html .= money_format( '%(#10n', $gratuity );
	$html .= '</div></li>';



	$taxes = WC() -> cart -> get_tax_totals();

	foreach( $taxes as $tax ) {
		$html .= '<li id="cart_taxes"><div class="p0 font_sm_S font_md_M col-xs-7 col-md-8 col-lg-9 text-left">';
		$html .= 'Taxes*:';
		$html .= '</div>';

		$html .= '<div class="cart_item_price col-xs-5 font_sm_S font_md_M col-md-4 col-lg-3 text-right">';
		$html .= money_format( '%(#10n', $tax->amount );
		$html .= '</div></li>';

		$totaltax += $tax->amount;
	}



	$total = $subtotal_ex_tax + $totaltax + $gratuity;


	die ( json_encode(
		array(
			'html' => $html,
			'items' => $cart_items_list,
			'items_info' => $cart_items_info,
			'total' => money_format( '%(#10n', $total ),
			'total_half' => money_format( '%(#10n', $total / 2 ),
		)
	));

}




add_action( 'wp_ajax_info_carrito', 'info_carrito' );
add_action( 'wp_ajax_nopriv_info_carrito', 'info_carrito' );

function info_carrito() {

	$cantidad = WC()->cart->get_cart_contents_count();
	$total = WC()->cart->get_cart_total();

	die( json_encode( array( 'cantidad' => $cantidad, 'total' => $total ) ) );

}




add_action( 'wp_ajax_annadir_a_carrito', 'annadir_a_carrito' );
add_action( 'wp_ajax_nopriv_annadir_a_carrito', 'annadir_a_carrito' );

function annadir_a_carrito() {

	$id = $_POST['id'];

	$add = WC()->cart->add_to_cart( $id );

	die( json_encode( $add ) );

}


add_action( 'wp_ajax_quitar_del_carrito', 'quitar_del_carrito' );
add_action( 'wp_ajax_nopriv_quitar_del_carrito', 'quitar_del_carrito' );

function quitar_del_carrito() {

	$key = $_POST[ 'key' ];

	$rmv = WC()->cart->remove_cart_item( $key );

	die( json_encode( $rmv ) );


}


add_action( 'wp_ajax_set_cart_item_quantity', 'set_cart_item_quantity' );
add_action( 'wp_ajax_nopriv_set_cart_item_quantity', 'set_cart_item_quantity' );

function set_cart_item_quantity() {

	$key = $_POST['key'];
	$quantity = $_POST['quantity'];

	$set = WC()->cart->set_quantity( $key, $quantity );


	die( json_encode( $quantity ) );

}

add_action( 'wp_ajax_clear_cart', 'clear_cart' );
add_action( 'wp_ajax_nopriv_clear_cart', 'clear_cart' );

function clear_cart() {

	$empty = WC()->cart->empty_cart( true );

	die( json_encode( $empty ) );


}




add_action( 'wp_ajax_cargar_coleccion', 'cargar_coleccion' );
add_action( 'wp_ajax_nopriv_cargar_coleccion', 'cargar_coleccion' );

function cargar_coleccion() {

	$ID = $_POST['id'];
	$nombre_coleccion = $_POST['nombre_coleccion'];

	$coleccion = array();

	$q = new WP_Query( array( 'post_type' => 'product' ) );

	if($q->have_posts()):

		ob_start();

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
	      <article id="publicacion_<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>" class="publicacion small-12 medium-6 large-4 columns p5 h_100 h_sm_70vh mb2">
	         <header class="h_10 h_sm_15">
	            <h4 class="titulo">
	               <?php echo apply_filters( 'the_title', get_the_title() ); ?>
	            </h4>
	         </header>
	         <section class="imagen h_30 imgLiquid imgLiquidNoFill">
	            <?php
	            if( has_post_thumbnail() ) {
	               echo get_the_post_thumbnail();
	            }
	            ?>
	         </section>
	         <div class="extracto columns h_20 h_sm_25 m0 p4">
               <p class="fontS mb0 p0">
                  <?php echo  get_the_excerpt(); ?>
               </p>
	         </div>
	         <footer class="text-center h_25 h_sm_30">
	            <div class="precio columns fontXL h_a p4">
	               <?php echo $precio; ?>
	            </div>
	            <div class="acciones columns h_a">
	               <div class="leer_mas columns small-6 h_a">
	                  <a href="<?php echo get_the_permalink(); ?>" class="publicacion-leer_mas button fontM">
	                     Ver más
	                  </a>
	               </div>
	               <div class="comprar columns small-6 h_a">
	                  <a href="#" class="publicacion-comprar button fontM" data-id="<?php echo get_the_ID(); ?>">
	                     Comprar
	                  </a>
	               </div>
	            </div>
	         </footer>

	      </article>

	      <?php

	   endwhile;

		$coleccion = ob_get_contents();

		ob_end_clean();


	endif;

	// $coleccion['publicaciones'] = $publicaciones;

	die( json_encode( array('titulo'=>$nombre_coleccion, 'html'=>$coleccion) ) );

}

?>
