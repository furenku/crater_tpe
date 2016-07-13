<section id="inicio-catalogo" class="small-12 columns p0 m0 ha">

  <?php

  get_template_part("secciones/00-compartidas/01-texto-descriptivo-seccion");

  for ($i=0; $i < 3; $i++) {
    ?>

    <article id="inicio-catalogo-producto" class="small-12 large-4 columns p0 h_80vh h_md_25vh h_sm_25vh">


      <div class="small-4 large-12 columns h_30 h_md_100 h_sm_100 imgLiquid imgLiquidFill">
        <img src="http://fakeimg.pl/250x320">
      </div>

      <h1 id="inicio-catalogo-producto-titulo" class="small-8 medium-8 large-12 columns p2 fontXL font_sm_L font_md_M text-center">
        Lorem ipsum dolor sit amet.
      </h1>

      <div id="inicio-catalogo-producto-fecha" class="small-8 medium-8 large-12 columns p0 pr2 fontS font_md_XS font_sm_XS text-right h_5">
        <small>publicado el </small>1 enero 1979
      </div>

      <div id="inicio-catalogo-producto-extracto" class="small-8 medium-8 large-12 columns p2 pt2 fontL font_md_M font_sm_S text-left h_50">
        <div class="small-12 vcenter">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aut, minus quos a incidunt dolorem exercitationem explicabo enim sunt!.
        </div>
      </div>




    </article>




    <?php

  }

  ?>


<?php

get_template_part("secciones/02-inicio/02-catalogo-sliders");

?>
</section>
