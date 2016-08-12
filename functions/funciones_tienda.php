<?php

function cargar_coleccion( $nombre_coleccion, $posts_per_page = -1 , $mostrar_info_tienda = true ) {

	$coleccion = array();

	$cat = get_term_by('name',$nombre_coleccion,'product_cat');
	$catID = $cat->term_id;

	$columnas_imagen = "columns";
	$columnas_texto = "columns";

	if( ! strcmp( $cat->name, "Talleres" ) ) {
		$columnas_imagen 		= "columns small-4";
		$columnas_texto 		= "columns small-8";
	}
	$q = new WP_Query( array(
		'post_type' => 'product',
		'posts_per_page' => $posts_per_page,

		'tax_query'       => array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => array( $catID )
		)
	) );

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
			<article id="publicacion_<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>" class="publicacion columns medium-6 large-4 h_50vh p4">
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

		<?php

		endwhile;

		$coleccion = ob_get_contents();

		ob_end_clean();

	endif;

	return $coleccion;

}


function obtener_coleccion( $nombre_coleccion, $posts_per_page = -1 , $mostrar_info_tienda = true ) {

	$coleccion = array();

	$cat = get_term_by('name',$nombre_coleccion,'product_cat');
	$catID = $cat->term_id;

	$columnas_imagen = "columns";
	$columnas_texto = "columns";

	if( ! strcmp( $cat->name, "Talleres" ) ) {
		$columnas_imagen 		= "columns small-4";
		$columnas_texto 		= "columns small-8";
	}
	$q = new WP_Query( array(
		'post_type' => 'product',
		'posts_per_page' => $posts_per_page,

		'tax_query'       => array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => array( $catID )
		)
	) );

	$coleccion = NULL;

	if($q->have_posts()):

		$coleccion = array();

		while($q->have_posts()):

			$q->the_post();


			$precio = 0;
			$precio = get_post_meta(get_the_ID(),'_sale_price',true);
			if( $precio == "" || ! $precio  ) {
				$precio = get_post_meta(get_the_ID(),'_regular_price',true);
			}

			$precio = get_woocommerce_currency_symbol() . $precio;

			$producto = array(
				'ID' => get_the_ID(),
				'titulo' => apply_filters( 'the_title', get_the_title() ),
				'imagen' => get_the_post_thumbnail(),
				'extracto' => apply_filters('the_excerpt', get_the_excerpt()),
				'precio' => $precio,
				'link' => get_the_permalink(),
			);

			array_push( $coleccion, $producto );

		endwhile;


	endif;

	return $coleccion;

}
