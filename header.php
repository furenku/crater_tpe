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

   </section>

   <div id="area-stickies" class="row expanded h_a">

      <header id="cabecera" class="row expanded h_3em" data-sticky-container>
         <div class="sticky w_100 white_bg z1 h_3em" data-sticky data-anchor="area-stickies" data-margin-top="0">

            <!-- #cabecera-logotipo.columns.small-5.medium-4.large-3 -->
            <div id="cabecera-logotipo" class="columns small-5 medium-3 large-2">
               Logotipo
            </div>

            <!-- #cabecera-titular.columns.small-7.medium-8.large-9 -->
            <div id="cabecera-titular" class="columns small-7 medium-6 large-7">
               <?php
               if( is_page('Catálogo') ) {
                  ?>
                     <nav id="ecommerce-nav">
                        <ul>

                           <li class="columns medium-3 fontXXS">
                              <div class="etiqueta columns small-8">
                                 Carrito
                              </div>
                              <div class="total columns small-4">
                                 $99999.99
                              </div>
                           </li>


                           <li class="columns medium-3 fontXXS">
                              Realizar pedido
                           </li>


                           <li class="columns medium-3 fontXXS">
                              Mi cuenta
                           </li>

                           <li class="columns medium-3 fontXXS">
                              Salir/Registrarse
                           </li>

                        </ul>
                     </nav>
                  <?php
               }
               ?>
            </div>

            <div class="columns small-12 medium-3 large-2">
               <a href="#" id="menu-boton" class="button hollow fontM m0 text-center z1">
                  Menú
               </a>
            </div>

         </div>

      </header>


      <!-- #menu-y-principal.row.h_85vh.scroll_h -->

      <div id="menu-y-principal" class="row expanded h_a">


         <!-- main#principal.columns.small-12.medium-9.large-10 -->
         <main id="principal" class="columns small-12 medium-9 large-10">
