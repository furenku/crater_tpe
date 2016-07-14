<?php

$taxonomy     = 'product_cat';
$parent       = get_term_by( 'name', 'Colecciones', 'product_cat' )->term_id;
$orderby      = 'ASC';
$show_count   = 1;
$pad_counts   = 0;
$hierarchical = 1;
$title        = '';
$empty        = 1;

$args = array(
   'taxonomy'     => $taxonomy,
   'parent'       => $parent,
   'child_of'     => $parent,
   'orderby'      => $orderby,
   'show_count'   => $show_count,
   'pad_counts'   => $pad_counts,
   'hierarchical' => $hierarchical,
   'title_li'     => $title,
   'hide_empty'   => $empty,
);

$all_categories = get_categories( $args );

foreach ($all_categories as $cat) {
   $category_id = $cat->term_id;
   ?>

   <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>" class="columns medium-6">
      <?php
      $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image = wp_get_attachment_url( $thumbnail_id );
      ?>
      <div class="imagen h_25vh imgLiquid imgLiquidFill">
         <img src="<?php echo $image; ?>" alt="">
      </div>
      <?php echo $cat->name; ?>
   </a>

   <?php

}

?>
