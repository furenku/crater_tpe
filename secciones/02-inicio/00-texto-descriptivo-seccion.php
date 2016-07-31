<?php
global $pagina_superior;
?>

<div id="texto-descriptivo-contenedor" class="small-12 columns mt1 mb1 p5 h_20vh h_sm_25 h_md_20">

   <div id="texto-descriptivo-texto" class="columns small-12 p0 text-left">

      <div class="extracto small-12 vcenter fontXL font_md_M font_sm_S">
         <?php echo apply_filters( 'the_excerpt', $pagina_superior->post_excerpt ); ?>
      </div>

   </div>

</div>
