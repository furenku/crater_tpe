<section id="inicio-informacion" class="contenedor_titular_interactivo small-12 columns h_90vh  p0 m0">

   <h1 class="titular_interactivo">Información</h1>


   <?php

   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

   for ($i=0; $i < 3; $i++) {

   ?>

   <!-- primer bloque -->
   <div id="inicio-informacion-X" class="small-12 large-4 columns p0 rel h_80 h_md_25 h_sm_25">

      <div id="inicio-informacion-uno-imagen" class="h_100 w_100 absUpL z0 imgLiquid imgLiquidFill">
         <img src="http://fakeimg.pl/250x320">
      </div>
      <div class="texto h_100 absUpL z1 p0 m0">

         <div class="vcenter h_30vh">
            <div id="inicio-informacion-uno-titulo" class="small-12 columns ha p3 fontXL font_md_L font_sm_M text-center">
               Título información
            </div>

            <div id="inicio-informacion-uno-texto" class="small-12 columns h_30 p3 fontL font_md_M font_sm_S text-left">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe quis illum nisi.
            </div>
         </div>

      </div>

   </div>

   <?php
   }
   ?>


</section>
