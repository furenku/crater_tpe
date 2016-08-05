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
         $('#catalogo-colecciones .coleccion').click(activar_colecciones);

         $("#catalogo-colecciones .boton-regresar").click(function(){
            $('#catalogo-colecciones .titulo').animate({opacity:0},400);
            $('#catalogo-colecciones .elementos').animate({opacity:0},400,function(){

               $('#catalogo-colecciones .titulo_principal').html( "Colecciones" );
               $("#catalogo-colecciones .boton-regresar").addClass('op0');
               $('#catalogo-colecciones .elementos').slick('unslick');
               $('#catalogo-colecciones .elementos').html(colecciones);

               $('#catalogo-colecciones .coleccion').click(activar_colecciones);

               setTimeout(function(){
                  $('#catalogo-colecciones .elementos').animate({opacity:1},400);
                  catalogo_sliders();
                  $('#catalogo-colecciones .titulo').animate({opacity:1},400);
               },150);

            });
         });


}


function activar_colecciones(e) {

   var nombre_coleccion = $(this).find('.titulo').html();

   var ajaxData = {
      type:"POST",
      url: tpe_ajax.ajaxurl,
      data: {
         nombre_coleccion: nombre_coleccion,
         action: 'cargar_coleccion'
      },
      dataType: 'json',
      success: function( resultado ) {
         $('#catalogo-colecciones .elementos').animate({opacity:0},300,function(){

            $('#catalogo-colecciones .titulo_principal').html( resultado.titulo );
            $("#catalogo-colecciones .boton-regresar").removeClass('op0');
            $('#catalogo-colecciones .elementos').slick('unslick');
            colecciones=$('#catalogo-colecciones .elementos').html();
            $('#catalogo-colecciones .elementos .titulo').html( resultado.titulo );
            $('#catalogo-colecciones .elementos').html( resultado.html );
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

}
