<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Suscripciones" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));
$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p5 m0 h_90vh">

   <h1 class="titular_interactivo">Suscripciones</h1>

   <div id="<?php echo $html_id; ?>-contenido" class="columns medium-9 large-10">

      <div class="columns">
         <div id="inicio-suscripciones-imagen" class="small-12 large-6 columns p0 pt2 h_50vh h_md_30vh h_sm_30vh">

            <div class="large-12 columns h_100 imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail( $pagina_superior->ID, 'large' ); ?>
            </div>

         </div>

         <div id="inicio-suscripciones-texto" class="small-12 large-6 columns p0 h_50vh pt2 h_md_40 h_sm_30vh fontL p6">
            <div class="vcenter h_a">
               <?php echo apply_filters( 'the_content', $pagina_superior->post_content ); ?>
            </div>
         </div>


         <?php
         set_query_var( 'pagina_a_cargar', get_page_by_title("Suscripciones")->ID );
         get_template_part("secciones/02-inicio/00-texto-descriptivo-seccion");
         ?>

      </div>
   </div>


   <?php get_template_part('secciones/02-inicio/00-boton-enlace-seccion'); ?>

</section>
