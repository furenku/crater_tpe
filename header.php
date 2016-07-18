<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>
      <?php echo bloginfo('name'); ?>
   </title>

   <?php wp_head(); ?>

</head>
<body>

   <!-- section#portada -->
   <section id="portada" class="row expanded p0 m0 h_100vh">
      <div id="portada-variable" class="h_100vh">
         <?php include_once 'secciones/01-portada/00-portada_variable.php'; ?>
      </div>


      <div class="" data-sticky-container>

         <div class="sticky h_a text-right right" data-sticky data-anchor="portada" data-margin-top="3">
            <a href="#" id="menu-boton" class="button hollow fontM m0 text-center z1 right mr2">
               Menú
            </a>
         </div>
      </div>


   </section>

   <div id="area-stickies" class="row expanded h_a rel">

      <header id="cabecera" class="row expanded h_3em" data-sticky-container>
         <div class="sticky w_100 color_blanco_bg z1 h_3em" data-sticky data-anchor="area-stickies" data-margin-top="0">

            <!-- #cabecera-logotipo.columns.small-5.medium-4.large-3 -->
            <div id="cabecera-logotipo" class="columns small-5 medium-3 large-2">
               Logotipo
            </div>

            <!-- #cabecera-titular.columns.small-7.medium-8.large-9 -->
            <div id="cabecera-titular" class="columns small-7 medium-9 large-10">

               <?php

               if( is_page('Catálogo') || in_array( get_page_by_title('Tienda')->ID, get_post_ancestors($post) ) )
                  get_template_part('secciones/00-general/menu-ecommerce'); ?>

            </div>


         </div>

      </header>


      <!-- #menu-y-principal.row.h_85vh.scroll_h -->

      <div id="menu-y-principal" class="row expanded h_a">


         <!-- main#principal.columns.small-12.medium-9.large-10 -->
         <main id="principal" class="columns small-12 medium-9 large-10">
