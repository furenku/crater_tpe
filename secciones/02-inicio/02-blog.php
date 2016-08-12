<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Proyectos" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));

$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<?php

$proyectos = get_posts(
array(
   'post_type'=>'proyecto',
   'posts_per_page'=>3
)
);

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p0  m0 ha">

   <h1 class="titular_interactivo">Blog</h1>

   <?php get_template_part('secciones/02-inicio/00-boton-enlace-seccion'); ?>

   <div id="<?php echo $html_id; ?>-contenido" class="columns medium-9 large-10">

      <div class="columns">
         <?php

         set_query_var( 'pagina_a_cargar', $pagina_superior->ID );
         get_template_part("secciones/02-inicio/00-texto-descriptivo-seccion");

         ?>

         <!-- ultimo post -->
         <div id="inicio-blog-post-reciente" class="medium-12 large-5 columns p0 h_90vh">


            <article id="inicio-blog-ultimo" class="large-12 columns p0 h_80vh">


               <div class="large-12 columns h_35vh imgLiquid imgLiquidFill">
                  <?php echo get_the_post_thumbnail( $proyectos[0] -> ID, 'medium' ); ?>
               </div>

               <div class="texto columns h_40vh pt1 pl0">

                  <h3 id="inicio-blog-ultimo-titulo" class="large-12 columns p3 pl0 text-left">
                     <?php echo apply_filters( 'the_title', $proyectos[0] -> post_title ); ?>
                  </h3>

                  <div id="inicio-blog-ultimo-fecha" class="large-12 columns p0 pl0 pr2 fontM font_md_S font_sm_XS text-right h_5">
                     <small>Publicado el </small><?php echo get_the_date( 'd \d\e F\, Y', $proyectos[0] -> ID ); ?>
                  </div>

                  <div id="inicio-blog-ultimo-extracto" class="large-12 columns p3 pl0 pt2 text-left h_40 pr0">
                     <div class="small-12 vcenter fontL pt0">
                        <?php echo apply_filters( 'the_excerpt', $proyectos[0] -> post_excerpt ); ?>
                     </div>
                  </div>

               </div>

            </article>


         </div>


         <!-- inician post secundarios -->
         <div id="inicio-blog-post-secundarios" class="medium-12 large-7 columns p0 h_70vh">


            <?php
            for ($i=0; $i < 2; $i++) {
               ?>

               <article id="inicio-blog-secundarios" class="medium-12 large-12 columns p0 h_50">

                  <div class="small-6 columns h_100 imgLiquid imgLiquidFill">
                     <?php echo get_the_post_thumbnail( $proyectos[ $i + 1 ] -> ID, 'medium' ); ?>
                  </div>

                  <div class="texto small-6 columns">

                     <h4 id="inicio-blog-secundarios-titulo" class="columns p3 pl0 font_sm_L font_md_M text-left">
                        <?php echo apply_filters( 'the_title', $proyectos[ $i + 1 ] -> post_title ); ?>
                     </h4>

                     <div id="inicio-blog-secundarios-fecha" class=" columns p0  fontS font_md_XS font_sm_XS text-right h_5">
                        <small>Publicado el </small><?php echo get_the_date( 'd \d\e F\, Y', $proyectos[ $i + 1 ] -> ID ); ?>
                     </div>

                     <div id="inicio-blog-secundarios-extracto" class="columns p3 pl0 pr0 pt2 fontM font_md_M font_sm_S text-left h_50">
                        <div class="small-12 vcenter">
                           <?php echo apply_filters( 'the_excerpt', $proyectos[ $i + 1 ] -> post_excerpt ); ?>
                        </div>
                     </div>

                  </div>



               </article>




               <?php

            }

            ?>

         </div><!-- terminan post secundarios -->

      </div>
   </div>

</section>
