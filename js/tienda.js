/*

Interacción menú:

- Listado Publicaciones

   - Botón comprar
   - Al clicarlo
      - Se hace llamada AJAX para añadir producto al carrito

      - Se muestra un ajaxloader en Botón "Comprar"
      - Se muestra un ajaxloader en Menú "Carrito" (en header)


   - Al regresar exitosamente AJAX,
      - Se actualiza el monto total en Menú "Carrito"
      - Se sustituye el botón comprar por:
         - Input para la cantidad de ejemplares deseado
         - botón "Actualizar cantidad"
         - botón "Eliminar de carrito"

*/
$(document).ready(function(){


   if( $('.publicacion-comprar').length > 0 ) {

      $('.publicacion-comprar').click(function(){

         id = $(this).data('id');

         var ajaxData = {
            type:"POST",
            url: tpe_ajax.ajaxurl,
            data: {
               action: 'annadir_a_carrito',
               id: id
            },
            dataType: 'json',
            success: function( resultado ) {
               actualizar_carrito();
               habilitar_cantidad_ejemplares(id);
            }
         }

         $.ajax(ajaxData);

      });

   }

});

function actualizar_carrito() {

   var ajaxData = {
      type:"POST",
      url: tpe_ajax.ajaxurl,
      data: {
         action: 'info_carrito'
      },
      dataType: 'json',
      success: function( resultado ) {
         // console.log( resultado );
         $('#ecommerce-nav-carrito-total').html( resultado.total );
         $('#ecommerce-nav-carrito-cantidad').html( resultado.cantidad );
      }
   }

   $.ajax(ajaxData);

}




function habilitar_cantidad_ejemplares( id ){
   console.log( "habilitar", id )
}
