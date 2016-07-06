<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo bloginfo('name'); ?></title>

   <?php wp_head(); ?>

</head>
<body>

   <!-- section#portada -->
   <section id="portada" class="rel h_90vh">

      <?php include_once 'secciones/01-portada/00-portada_variable.php'; ?>

      <a href="#" id="menu-boton" class="absDownR hollow button fontXL text-center z1">
         Menú
      </a>

   </section>

   <div id="area-stickies" class="row expanded h_a">

      <header id="cabecera" class="row expanded h_3em" data-sticky-container>
         <div class="sticky w_100 white_bg z1 h_3em" data-sticky data-anchor="area-stickies" data-margin-top="0">

            <!-- #cabecera-logotipo.columns.small-5.medium-4.large-3 -->
            <div id="cabecera-logotipo" class="columns small-5 medium-3 large-2">
               Logotipo
            </div>

            <!-- #cabecera-titular.columns.small-7.medium-8.large-9 -->
            <div id="cabecera-titular" class="columns small-7 medium-9 large-10">
               Titular
            </div>

         </div>

      </header>


      <!-- #menu-y-principal.row.h_85vh.scroll_h -->

      <div id="menu-y-principal" class="row expanded h_a">


         <!-- main#principal.columns.small-12.medium-9.large-10 -->
         <main id="principal" class="columns small-12 medium-9 large-10">
