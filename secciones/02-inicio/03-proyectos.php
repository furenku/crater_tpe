<section id="inicio-blog" class="contenedor_titular_interactivo small-12 columns p0 m0 ha">

   <h1 class="titular_interactivo">
      Proyectos
   </h1>

   <?php
   set_query_var( 'pagina_a_cargar', get_page_by_title("Proyectos")->ID );

   get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

   ?>

   <!-- ultimo post -->
   <div id="inicio-blog-post-reciente" class="medium-12 large-6 columns p0 h_90vh">


      <article id="inicio-blog-ultimo" class="large-12 columns p0 h_80vh">


         <div class="large-12 columns h_30 imgLiquid imgLiquidFill">
            <img src="http://fakeimg.pl/250x320">
         </div>

         <h3 id="inicio-blog-ultimo-titulo" class="large-12 columns p3 text-left">
            Lorem ipsum dolor sit amet Fuga.
         </h3>

         <div id="inicio-blog-ultimo-fecha" class="large-12 columns p0 pr2 fontM font_md_S font_sm_XS text-right h_5">
            <small>Publicado el </small>1 enero 1979
         </div>

         <div id="inicio-blog-ultimo-extracto" class="large-12 columns p3 pt0 text-left h_40">
            <div class="small-12 vcenter fontL pt0">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aut, minus quos a incidunt dolorem exercitationem explicabo enim sunt!.
               consectetur adipisicing elit. Fuga aut, minus quos a incidunt dolorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </div>
         </div>


      </article>


   </div>


   <!-- inician post secundarios -->
   <div id="inicio-blog-post-secundarios" class="medium-12 large-6 columns p0 h_sm_90vh">


      <?php
      for ($i=0; $i < 2; $i++) {
         ?>

         <article id="inicio-blog-secundarios" class="medium-12 large-12 columns p0 h_30vh h_md_20vh h_sm_20">


            <div class="small-4 columns h_100 imgLiquid imgLiquidFill">
               <img src="http://fakeimg.pl/250x320">
            </div>

            <h4 id="inicio-blog-secundarios-titulo" class="small-8 columns p3 font_sm_L font_md_M text-left">
               Lorem ipsum dolor sit amet.
            </h4>

            <div id="inicio-blog-secundarios-fecha" class="small-8  columns p0 pr2 fontS font_md_XS font_sm_XS text-right h_5">
               <small>Publicado el 1 enero 1979</small>
            </div>

            <div id="inicio-blog-secundarios-extracto" class="small-8 columns p3 pt2 fontM font_md_M font_sm_S text-left h_50">
               <div class="small-12 vcenter">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aut, minus quos a incidunt dolorem exercitationem explicabo enim sunt!.
               </div>
            </div>




         </article>




         <?php

      }

      ?>

   </div><!-- terminan post secundarios -->



</section>
