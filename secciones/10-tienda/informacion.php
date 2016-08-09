<?php
$tienda_informacion = get_page_by_title('Información Tienda');

$paginas_hijas = get_pages( array( 'parent' => $tienda_informacion->ID ) );
foreach ($paginas_hijas as $pagina_hija ) :
?>

<article class="columns medium-6 p5 ">

   <header class="titulo columns">
      <h2>
         <?php echo apply_filters( 'the_title', $pagina_hija -> post_title ); ?>
      </h2>
   </header>
   <div class="texto columns pt2 fontL">
      <?php echo apply_filters( 'the_content',  $pagina_hija -> post_content ); ?>
   </div>

</article>

<?php endforeach; ?>
