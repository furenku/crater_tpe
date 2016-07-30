<?php
/*
Template Name: Información
*/

get_header();
// global $paginas_hijas;
$pagina_principal = get_page_by_title("Información");
$ID =$pagina_principal->ID;

$paginas_hijas = get_pages( array( "child_of" => $ID, "parent" => $ID ));
// var_dump($paginas_hijas);

$i=0;

foreach ( $paginas_hijas as $pagina_hija ): $i++;?>

<?php $scrollOnLoad = $ID_actual == $pagina_hija->ID ? ' data-scroll_on_load="true"' : ''; ?>

<section id="pagina_informacion_<?php echo $pagina_hija->ID; ?>" class="scroll_on_load_target contenedor_titular_interactivo columns  h_a pt2" <?php echo $scrollOnLoad; ?>>


   <h1 class="titular_interactivo h_a op0">
      <?php echo apply_filters('the_title', $pagina_hija->post_title); ?>
   </h1>


   <div class="small-12 columns ">

      <div class="imagen columns small-6 h_30vh mt2 imgLiquid imgLiquidFill">
         <?php echo get_the_post_thumbnail($pagina_hija->ID,'medium'); ?>
      </div>

      <div class="extracto columns small-6 h_30vh fontL">
         <div class="vcenter h_a">
            <?php echo apply_filters('the_content', $pagina_hija->post_content); ?>
         </div>
      </div>


      <div class="columns mt2 p5">

         <?php

         $columns = "small-6 medium-4 large-3";

         $custom_cpt = false;

         if( ! strcmp( $pagina_hija->post_title, "Editoriales" ) ) {
            $post_type = "editorial";
            $columns = "small-12 medium-6 large-4";
            $custom_cpt = true;
         }


         if( ! strcmp( $pagina_hija->post_title, "Gente" ) ) {
            $post_type = "persona";
            $columns = "small-4 medium-3 large-2";
            $custom_cpt = true;
         }


         if( ! strcmp( $pagina_hija->post_title, "Proyectos" ) ) {
            $post_type = "proyecto";
            $columns = "small-6 medium-4 large-3";
            $custom_cpt = true;
         }

         if( $custom_cpt ) {
            $args = array( 'post_type' => $post_type, 'posts_per_page' => -1 );
         }
         else {
            if( ! strcmp( $pagina_hija->post_title, "Modelos de Colaboración" ) ) {
               $args = array( 'post_type' => 'page', 'post_parent' => get_page_by_title('Modelos de Colaboración')->ID );
            }
            $columns = "small-12 medium-6 large-4";
         }


         $q = new WP_Query( $args );

         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();
               $ID = get_the_ID();
               $link = get_the_permalink( $ID );
               $img = get_the_post_thumbnail( get_the_ID(), 'thumb' );
               $ttl = apply_filters('the_title',get_the_title());
               ?>

               <article id="informacion_<?php echo $ID; ?>" class="columns <?php echo $columns; ?> h_40vh p5 rel">

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

      </div>

   </section>

   <?php
endforeach;


get_footer();
