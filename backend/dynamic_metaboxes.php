<?php

global $metaboxes;
$metaboxes = array(
   'editorial'=>array(

      'post_type'    => 'editorial',
      'name'         => 'editorial-persona',
      'title'        => 'Editorial',
      'description'  => '

      ',

      'fields' => array(
         array(
            'field_name'            => 'editorial-persona',

            'field_type'            => 'related_post',
            'repeatable'            => true,
            'related_post_types'    => array('persona'),

            'field_label'           => 'Miembros de la Editorial',
            'description'           => '
            <p class="fontXXS" style="font-size:10px">
            Elige los miembros pertenecientes a la Organización.
            </p>
            <p class="fontXXS" style="font-size:10px">
            (Deben ser creados previamente)
            </p>
            ',
            'markup_function'       => 'standard_metabox_markup'
         ),

      )

   ),

   'persona'=>array(

      'post_type'    => 'persona',
      'name'         => 'persona-editorial',
      'title'        => 'Editoriales!',

      'description'  => '...',

      'fields' => array(
         array(
            'field_name'            => 'persona-editorial',

            'field_type'            => 'related_post',
            'repeatable'            => true,
            'related_post_types'    => array('editorial'),

            'field_label'           => 'Editoriales a las que pertenece',
            'description'           => '
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            ',
            'markup_function'       => 'standard_metabox_markup'
         ),

      )

   ),

   'product'=>array(

      'post_type'    => 'product',
      'name'         => 'product-editoriales',
      'title'        => 'Información Producto',
      'description'  => '

      ',

      'fields' => array(
         array(
            'field_name'            => 'product-editorial',

            'field_type'            => 'related_post',
            'repeatable'            => true,
            'related_post_types'    => array('editorial'),

            'field_label'           => 'Editorial',
            'description'           => '
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            ',
            'markup_function'       => 'standard_metabox_markup'
         ),


         array(
            'field_name'            => 'product-persona',

            'field_type'            => 'related_post',
            'repeatable'            => true,
            'related_post_types'    => array('persona'),

            'field_label'           => 'Personas',
            'description'           => '
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            <p class="fontXXS" style="font-size:10px">
            ...
            </p>
            ',
            'markup_function'       => 'standard_metabox_markup'
         ),

      )

   ),

);

function standard_metabox_markup( $post,  $callback_args ) {

   $args = $callback_args['args'];
   $metabox = $args['metabox'];

   wp_nonce_field(basename(__FILE__), $metabox['name']."-metabox-nonce");

   ?>

   <p>
      <?php echo $metabox['description']; ?>
   </p>
   <div>
      <?php


      foreach($metabox['fields'] as $field ) :

         echo '<div class="field">';

         echo '<div class="field_label">';

         echo '<label for="'. $field['field_name'].'">'. $field['field_label'] .'</label>';

         echo '</div>';

         echo '<div class="field_inputs">';

         $related_posts = get_post_meta(
         $post->ID,
         $field['field_name'],
         true
      );



      if( $field['field_type'] == "related_post" ) {

         foreach ($field['related_post_types'] as $related_post_type ) {

            $posts = get_posts( array( 'post_type'=>$related_post_type ) );

            related_post_selector( $field['field_name'] . '[]', $posts, 0, true );

            if(is_array($related_posts)) {
               foreach( $related_posts as $related_post ) {
                  if( $related_post != "0" )
                  related_post_selector( $field['field_name'] . '[]', $posts, $related_post );
               }
            }

            related_post_selector( $field['field_name'] . '[]', $posts, 0 );

         }

      }

      if( $field['repeatable'] ) {
         ?>

         <div class="add_repeatable button">Añadir otro</div>

         <?php
      }

      echo '</div>';

      echo '</div>';

   endforeach; ?>

</div>
<?php
}

add_action("add_meta_boxes", "add_dynamic_metaboxes");
function add_dynamic_metaboxes()
{
   global $metaboxes;
   foreach($metaboxes as $metabox) :
      add_meta_box(
      $metabox['post_type']."-meta-box",
      $metabox['title'],
      "standard_metabox_markup",
      $metabox['post_type'],
      "side",
      "default",
      array('metabox'=>$metabox)
   );
endforeach;

?>

<script>
jQuery(document).ready(function($){

   $('.add_repeatable').click(function(){
      $(this).parent().find('.repeatable.hidden').clone().detach().removeClass('hidden').appendTo( '.repeatables' );
      $(this).parent().find('.delete_this.hidden').clone().detach().removeClass('hidden').appendTo( '.repeatables' );
   })

   $('.delete_this').click(function(){
      $(this).prev().remove();
      $(this).remove();
   })
})
</script>

<?php

}


function related_post_selector( $name, $posts, $id=0, $hidden=false ) {
   ?>
   <select class="repeatable <?php echo $hidden ? 'hidden':''; ?>" name="<?php echo $name; ?>">
      <option value="0" <?php echo ! $id ? 'selected' : ''; ?>></option>
      <?php
      foreach( $posts as $post ) : ?>

      <option value="<?php echo $post->ID; ?>" <?php echo $id==$post->ID ? 'selected="true"' : ''; ?>>
         <?php echo $post->post_title; ?>
      </option>

      <?php
   endforeach;
   ?>

</select>
<div class="delete_this button<?php echo $hidden ? ' hidden':''; ?>">x</div>
<br>
<?php
}

function save_dynamic_metaboxes($post_id, $post, $update)
{
   //
   //  $slug = "editorial";
   //  if($slug != $post->post_type)
   //      return $post_id;


   global $metaboxes;

   if(!current_user_can("edit_post", $post_id))
   return $post_id;

   if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
   return $post_id;

   foreach( $metaboxes as $metabox ) {
      if( $metabox['post_type'] == $post->post_type )
      if (!isset($_POST[ $metabox['name']."-metabox-nonce" ]) || !wp_verify_nonce($_POST[ $metabox['name']."-metabox-nonce" ], basename(__FILE__)))
      return $post_id;


      foreach($metabox['fields'] as $field) {


         if(isset($_POST[ $field['field_name'] ]))
         {

            $field_value = $_POST[ $field['field_name'] ];


            if( $field['field_type'] == "related_post" ) {

               $related_post_ids = $field_value;

               foreach( $related_post_ids as $related_post_id ) {

                  $related_post_type = $field['related_post_types'];
                  $related_post_type = $related_post_type[0];

                  // checar si hay arreglo de referencias a posts 1 en post 2 recien asignado
                  $posts = get_post_meta(
                     $related_post_id,
                     $related_post_type.'-'.$metabox['post-type'],
                     true
                  );

                  if( is_array($posts) ) {
                     if( ! in_array($post_id,$post_id))
                     array_push($posts, $post_id);
                  } else {
                     // si no, crear arreglo
                     $posts = array( $post_id );
                  }


                  update_post_meta(
                     $related_post_id,
                     $related_post_type.'-'.$metabox['post_type'],
                     array_unique($posts)
                  );

               }

            }

            update_post_meta(
               $post_id,
               $field['field_name'],
               $field_value

            );

         }

      }

   }

}

add_action("save_post", "save_dynamic_metaboxes", 10, 3);
