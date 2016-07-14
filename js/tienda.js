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


   interaccion_colecciones();

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





var colecciones;
function interaccion_colecciones() {


      if($('#catalogo-colecciones .coleccion').length>0)
         $('#catalogo-colecciones .coleccion').click(function(e){
            id = 0;
            var ajaxData = {
               type:"POST",
               url: tpe_ajax.ajaxurl,
               data: {
                  id: id,
                  action: 'cargar_coleccion'
               },
               dataType: 'json',
               success: function( resultado ) {
                  $('#catalogo-colecciones .elementos').animate({opacity:0},300,function(){

                     $('#catalogo-colecciones .elementos').slick('unslick');
                     colecciones=$('#catalogo-colecciones .elementos').html();
                     $('#catalogo-colecciones .elementos').html( resultado );
                     columnas=[3,2,1];
                     $('#catalogo-colecciones .elementos .imgLiquid.imgLiquidNoFill').imgLiquid({fill:false});
                     $('#catalogo-colecciones .elementos').slick({
                        dots: true,
                        slidesToShow: columnas[0],
                        slidesToScroll: columnas[0],
                        responsive: [
                           {
                              breakpoint: 1024,
                              settings: {
                                 slidesToShow: columnas[1],
                                 slidesToScroll: columnas[1]
                              }
                           },
                           {
                              breakpoint: 640,
                              settings: {
                                 slidesToShow: columnas[2],
                                 slidesToScroll: columnas[2]
                              }
                           }
                        ]
                     });

                     $('#catalogo-colecciones .elementos').animate({opacity:1});

                  });
               }
            }

            $.ajax(ajaxData);

            e.preventDefault();
            e.stopPropagation();
            return false;

         });


}
