<?php


get_header();

?>

<div class="section contenido p5 rel">
   <div class="columns medium-10 medium-offset-1 large-8 large-offset-2 fontL">
      <?php echo apply_filters('the_content', get_the_content()); ?>
   </div>
</div>


<?php
get_footer();
?>
