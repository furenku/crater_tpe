<?php
global $pagina_superior;
global $html_id;
?>

<div class="columns medium-3 large-2 h_20vh" data-sticky-container>
   <div class="sticky" data-sticky data-anchor="<?php echo $html_id;  ?>-contenido" data-options="marginTop:5">

      <div class="vcenter h_a text-center pr2">
         <a href="<?php echo get_the_permalink( $pagina_superior->ID ); ?>" class="button p4 fontM  mb0">
            Ir a <?php echo apply_filters('the_title', $pagina_superior->post_title ); ?>
         </a>
      </div>

   </div>
</div>
