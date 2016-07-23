<?php

/*CPT*/

// Crear CPTs dinámicamente


add_action( 'init', 'registrar_ctps' );


function registrar_ctps() {

   $cpts = array(

      array(
         'post_type' => 'editorial',
         'label_single' => 'Editorial',
         'label_plural'=> 'Editoriales',
      ),

      array(
         'post_type' => 'persona',
         'label_single' => 'Persona',
         'label_plural'=> 'Personas'
      ),

   );

   foreach( $cpts as $cpt ) {

      registrar_cpt( $cpt['post_type'], $cpt['label_single'], $cpt['label_plural'] );

   }

}


function registrar_cpt( $post_type, $singular, $plural ) {
   $labels = array(
      'name'               => _x( $plural, 'post type general name', 'tpe-cpts' ),
      'singular_name'      => _x( $singular, 'post type singular name', 'tpe-cpts' ),
      'menu_name'          => _x( $plural, 'admin menu', 'tpe-cpts' ),
      'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'tpe-cpts' ),
      'add_new'            => _x( 'Añadir nuevo', $singular, 'tpe-cpts' ),
      'add_new_item'       => __( 'Añadir nuevo ' . $singular, 'tpe-cpts' ),
      'new_item'           => __( 'Nuevo ' . $singular, 'tpe-cpts' ),
      'edit_item'          => __( 'Editar ' . $singular, 'tpe-cpts' ),
      'view_item'          => __( 'Ver ' . $singular, 'tpe-cpts' ),
      'all_items'          => __( 'Todos ' . $plural, 'tpe-cpts' ),
      'search_items'       => __( 'Buscar ' . $plural, 'tpe-cpts' ),
      'parent_item_colon'  => __( $plural . ' Superiores:', 'tpe-cpts' ),
      'not_found'          => __( 'No se encontraron ' . $plural, 'tpe-cpts' ),
      'not_found_in_trash' => __( 'No se encontraron ' . $plural . ' en la Basura.', 'tpe-cpts' )
   );

   $args = array(
      'labels'             => $labels,
      'description'        => __( 'Descripción.', 'tpe-cpts' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => $post_type ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
   );

   register_post_type( $post_type, $args );

}










include_once 'dynamic_metaboxes.php';



/* MetaBoxes */



add_action("add_meta_boxes", "add_editorial_miembros_metabox");
function add_editorial_miembros_metabox()
{
   add_meta_box("editorial_miembros-meta-box", "Miembros", "editorial_miembros_metabox_markup", "editorial", "side", "default", null);
}

function editorial_miembros_metabox_markup($object)
{
   wp_nonce_field(basename(__FILE__), "editorial_miembros-metabox-nonce");
   global $post;

   ?>
   <div>
      <p class="fontXXS" style="font-size:10px">
         Elige los miembros pertenecientes a la Organización.
      </p>
      <p class="fontXXS" style="font-size:10px">
         (Deben ser creados previamente)
      </p>
      <label for="editorial_miembros-metabox-texto" class="row">
         Miembros de la Editorial
      </label>
      <div class="repeatables">

         <?php selector_miembros(0,true); ?>

         <?php

         $miembros = get_post_meta($post->ID,'editorial_miembros',true);

         if( is_array( $miembros ) )
         foreach( $miembros as $miembro ) :
            if($miembro!=""&&$miembro!=0)
            selector_miembros($miembro);
         endforeach;

         selector_miembros();

         ?>


      </div>
      <div id="add_repeatable" class="button">Añadir Miembro</div>
   </div>

   <script>
   jQuery(document).ready(function($){

      $('#add_repeatable').click(function(){
         $('.repeatable.hidden').clone().detach().removeClass('hidden').appendTo( '.repeatables' );
         $('.delete_this.hidden').clone().detach().removeClass('hidden').appendTo( '.repeatables' );
      })

      $('.delete_this').click(function(){
         $(this).prev().remove();
         $(this).remove();
      })
   })
   </script>
   <?php
}

function selector_miembros($id=0,$hidden=false) {
   ?>
   <select class="repeatable<?php echo $hidden ? ' hidden':''; ?>" name="editorial_miembros[]">
      <option value="0"></option>
      <?php
      $personas = get_posts(array('post_type'=>'persona'));
      foreach( $personas as $persona ) : ?>

      <option value="<?php echo $persona->ID; ?>" <?php echo $id==$persona->ID ? 'selected="true"' : ''; ?>>
         <?php echo $persona->post_title; ?>
      </option>

      <?php
   endforeach;
   ?>

</select>
<div class="delete_this button<?php echo $hidden ? ' hidden':''; ?>">x</div>
<br>
<?php
}

function save_editorial_miembros_metabox($post_id, $post, $update)
{
   if (!isset($_POST["editorial_miembros-metabox-nonce"]) || !wp_verify_nonce($_POST["editorial_miembros-metabox-nonce"], basename(__FILE__)))
   return $post_id;

   if(!current_user_can("edit_post", $post_id))
   return $post_id;

   if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
   return $post_id;
   //
   //  $slug = "editorial";
   //  if($slug != $post->post_type)
   //      return $post_id;

   $meta_box_texto = "";

   if(isset($_POST["editorial_miembros"]))
   {
      $valores = $_POST["editorial_miembros"];

      foreach( $valores as $valor ) {

         // checar si hay arreglo de referencias a posts 1 en post 2 recien asignado
         $editoriales_persona = get_post_meta( $valor, 'persona_editoriales', true );
         if( is_array($editoriales_persona) ) {
            array_push($editoriales_persona, $post_id);
         } else {
            // si no, crear arreglo
            $editoriales_persona = array( $post_id );
         }
         update_post_meta($valor, 'persona_editoriales', $editoriales_persona );

         // ahí, añadir una referencia a este post en arreglo en post 2

      }

   }
   update_post_meta($post_id, "editorial_miembros", $valores );







}

add_action("save_post", "save_editorial_miembros_metabox", 10, 3);
