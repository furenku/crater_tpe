<?php

/*CPT*/

// Crear CPTs dinámicamente


add_action( 'init', 'registrar_ctps' );


function registrar_ctps() {

   $cpts = array(

      'editorial' => array(
         'post_type' => 'editorial',
         'label_single' => 'Editorial',
         'label_plural'=> 'Editoriales',
      ),

      'persona' => array(
         'post_type' => 'persona',
         'label_single' => 'Persona',
         'label_plural'=> 'Personas'
      ),

      'proyecto' => array(
         'post_type' => 'proyecto',
         'label_single' => 'Proyecto',
         'label_plural'=> 'Proyectos'
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
