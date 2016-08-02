<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Información" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));

$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p0 m0 ha">

   <h1 class="titular_interactivo">Información</h1>

   <div id="<?php echo $html_id; ?>-contenido" class="columns medium-9 large-10">

      <div class="columns">
         <?php

         set_query_var( 'pagina_a_cargar', $pagina_superior->ID );
         get_template_part("secciones/02-inicio/00-texto-descriptivo-seccion");


         $clase="inicio-informacion";
         foreach ($paginas as $pagina) :

            ?>

            <article id="<?php echo $clase; ?>-<?php echo get_the_ID(); ?>" class="columns small-12 medium-6  h_25vh p5 pt0 mb1 rel">
               <a href="<?php echo get_the_permalink($pagina->ID); ?>" class="h_100">

                  <div id="<?php echo $clase; ?>-imagen" class="h_60 columns small-6 z0 imgLiquid imgLiquidNoFill">
                     <?php echo get_the_post_thumbnail( $pagina -> ID, 'medium' ); ?>
                  </div>
                  <div class="texto h_60 pt1 m0">

                     <div id="<?php echo $clase; ?>-titulo" class=" columns small-6 h_3em p2 font_md_L font_sm_M text-left">
                        <div class="vcenter h_a">
                           <h5>
                              <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
                           </h5>
                        </div>
                     </div>

                     <div id="<?php echo $clase; ?>-texto" class="small-12 columns h_50 p3 fontM font_md_S font_sm_XS text-left">
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

   <?php get_template_part('secciones/02-inicio/00-boton-enlace-seccion'); ?>

</section>
