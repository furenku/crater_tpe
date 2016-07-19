   </main>


   <!-- aside#menu.columns.small-12.medium-3.large-2 -->
   <aside id="menu" class="columns small-12 medium-3 large-2 h_50vh" data-sticky-container>
      <!-- #cabecera-logotipo.columns.small-5.medium-4.large-3 -->

      <div class="sticky" data-sticky data-anchor="area-stickies" data-margin-top="0">
         <div id="cabecera-logotipo" class="h_5em mb1">
            <a href="<?php echo get_site_url(); ?>">
               <div class="imagen imgLiquid imgLiquidNoFill">
                  <img src="http://fakeimg.pl/300x100" alt="" />
               </div>
            </a>
         </div>
         <?php wp_nav_menu( array( 'theme_location' => 'menu-principal', 'container' => 'nav' ) ); ?>
      </div>

   </aside>


   </div><!-- #menu-y-principal -->


   <!-- footer#pie_pagina.row.expanded.h_5vh -->
   <footer id="pie_pagina" class="row expanded h_10vh">

     <div id="pie_pagina_copyright" class="small-6 medium-5 large-4 columns">

       <p class="small-12 text-center vcenter fontM bold"> <i class="fa fa-copyright fontS"></i> Cooperativa | <?php echo date("Y"); ?></p>

     </div>

     <div id="pie_pagina_redes" class="small-6 medium-7 large-8 columns">
       <ul class="small-12 columns m0 h_100">
         <li class="small-3 columns h_100 p0 m0 fontM"><i class="small-12 text-center fa fa-github p0 vcenter"></i></li>
         <li class="small-3 columns h_100 p0 m0 fontM"><i class="small-12 text-center fa fa-twitter p0 vcenter"></i></li>
         <li class="small-3 columns h_100 p0 m0 fontM"><i class="small-12 text-center fa fa-facebook p0 vcenter"></i></li>
         <li class="small-3 columns h_100 p0 m0 fontM"><i class="small-12 text-center fa fa-instagram p0 vcenter"></i></li>
       </ul>
     </div>

   </footer>




</div><!-- #area-stickies -->



</body>

<?php get_footer(); ?>

</html>
