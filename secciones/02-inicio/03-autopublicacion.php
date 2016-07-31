<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Autopublicación" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));

$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns pt2 pb4 m0 h_90vh">

   <h1 class="titular_interactivo">Autopublicación</h1>

   <div id="<?php echo $html_id; ?>-contenido" class="columns medium-9 large-10">

      <div class="columns">
         <?php

         set_query_var( 'pagina_a_cargar', $pagina_superior->ID );
         get_template_part("secciones/02-inicio/00-texto-descriptivo-seccion");


   $clase="inicio-autopublicacion";
   foreach ($paginas as $pagina) :

      ?>

      <!-- primer bloque -->
      <div id="<?php echo $clase; ?>" class="small-12 medium-4 columns p5 rel h_30vh h_md_25vh h_sm_25vh">

         <a href="<?php echo get_the_permalink($pagina->ID); ?>" class="w_100 h_100">

            <div id="<?php echo $clase; ?>-imagen" class="h_100 w_100 absUpL imgLiquid imgLiquidFill">
               <?php echo get_the_post_thumbnail( $pagina -> ID, 'large' ); ?>
            </div>

            <div class="cortina absUpL z1 w_100 h_100"></div>

            <div class="titulo w_100  h_100 absUpL z1 m0">
               <div class="vcenter w_100 h_a text-center p5 pt0 pb0">
                  <h2>
                     <?php echo apply_filters( 'the_title', $pagina->post_title ); ?>
                  </h2>
               </div>
            </div>

         </a>

      </div>

      <?php
   endforeach;
   ?>



         </div>
      </div>


         <?php get_template_part('secciones/02-inicio/00-boton-enlace-seccion'); ?>

      </section>
