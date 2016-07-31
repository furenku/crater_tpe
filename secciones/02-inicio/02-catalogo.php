<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Catálogo" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));
$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p0 m0 ha">

   <h1 class="titular_interactivo">Nuestro catálogo</h1>

   <?php get_template_part('secciones/02-inicio/00-boton-enlace-seccion'); ?>

   <div id="<?php echo $html_id; ?>-contenido" class="columns medium-9 large-10">

      <div class="columns">
         <?php

         set_query_var( 'pagina_a_cargar', $pagina_superior->ID );
         get_template_part("secciones/02-inicio/00-texto-descriptivo-seccion");

         foreach ($paginas as $pagina) :

            ?>

            <article id="<?php echo $html_id . '-' . $pagina->ID; ?>" class="small-12 large-4 columns p3  h_80vh h_md_25vh h_sm_25vh">

               <a href="<?php echo get_the_permalink( $pagina -> ID ); ?>">

                  <div class="small-4 large-12 columns h_30 h_md_100 h_sm_100 imgLiquid imgLiquidFill">
                     <?php echo get_the_post_thumbnail(  $pagina->ID , 'large' ); ?>
                  </div>

                  <h3 class="inicio-catalogo-producto-titulo small-8 medium-8 large-12 columns p0 pt1 text-center">
                     <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
                  </h3>

                  <div class="inicio-catalogo-producto-extracto small-8 medium-8 large-12 columns p0 pt1 fontL font_md_M font_sm_S text-left h_50">
                     <div class="small-12 vcenter">
                        <?php echo apply_filters( 'the_excerpt', $pagina->post_excerpt ); ?>
                     </div>
                  </div>

               </a>



            </article>

            <?php
         endforeach;
         ?>

      </div>
   </div>


</section>
