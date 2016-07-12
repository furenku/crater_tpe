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




add_action( 'wp_ajax_actualizar_total', 'actualizar_total' );
add_action( 'wp_ajax_nopriv_actualizar_total', 'actualizar_total' );

function actualizar_total() {

	$total = WC()->cart->get_cart_total();

	die( json_encode( $total ) );

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

?>
