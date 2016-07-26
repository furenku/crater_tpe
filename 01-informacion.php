<?php
/*
Template Name: Información
*/

global $paginas_informacion;
get_header();
$i=0;

foreach ( $paginas_informacion as $pagina_informacion ): $i++;?>

<section id="pagina_informacion_<?php echo $pagina_informacion->ID; ?>" class="contenedor_titular_interactivo columns  h_a pt2">


   <h2 class="titular_interactivo h_a">
      <?php echo apply_filters('the_title', $pagina_informacion->post_title); ?>
   </h2>


   <div class="small-12 columns ">

      <div class="imagen columns small-6 h_30vh mt2 imgLiquid imgLiquidFill">
         <?php echo get_the_post_thumbnail($pagina_informacion->ID,'medium'); ?>
      </div>

      <div class="extracto columns small-6 h_30vh fontL">
         <div class="vcenter h_a">
            <?php echo apply_filters('the_content', $pagina_informacion->post_content); ?>
         </div>
      </div>


   <div class="columns mt2 p5">

      <?php

      if( ! strcmp( $pagina_informacion->post_title, "Editoriales" ) ) $post_type = "editorial";
      if( ! strcmp( $pagina_informacion->post_title, "Gente" ) ) $post_type = "persona";
      if( ! strcmp( $pagina_informacion->post_title, "Proyectos" ) ) $post_type = "proyecto";
      if( ! strcmp( $pagina_informacion->post_title, "Modelos" ) ) $post_type = "modelo_colaboracion";


      $args = array( 'post_type' => $post_type, 'posts_per_page' => -1 );
      // $args = array( 'posts_per_page' => -1 );

      $q = new WP_Query( $args );

      if( $q->have_posts() ) :
         while ( $q->have_posts() ) :
            $q->the_post();
            $ID = get_the_ID();
            $link = get_the_permalink( $ID );
            $img = get_the_post_thumbnail( get_the_ID(), 'thumb' );
            $ttl = apply_filters('the_title',get_the_title());
            ?>

            <article id="informacion_<?php echo $ID; ?>" class="columns small-6 medium-4 large-3 h_40vh p5 rel">

               <a href="<?php echo $link; ?>" class="w_100 h_100 rel">
                  <div class="imagen h_60 imgLiquid <?php echo $post_type == "persona" ? 'imgLiquidNoFill' : 'imgLiquidFill'; ?>">
                     <?php echo $img; ?>
                  </div>
                  <div class="h_40 text-center p2 pt0">
                     <div class="vcenter h_a">
                        <h6>
                           <?php echo $ttl; ?>
                        </h6>
                     </div>
                  </div>
               </a>
            </article>

            <?php
         endwhile;
      endif;
      ?>
   </div>

</section>

<?php
endforeach;


get_footer();
