var scrolling = 0;

u = new FrontEndUtils();

$(document).ready(function(){

   $(document).foundation();

   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({
      fill:false
   });

   $(window).on('resize',function(){

      u.vcenter();
      u.shareH();
      u.shareW();
      u.squareH();

   })

   $(window).trigger('resize');


   boton_scroll_portada();
   function boton_scroll_portada() {
      $('#inicio-portada-ver-mas').click(function(){
         $('body,html').animate({ scrollTop:$('#inicio-portada').innerHeight() }, 600);
      })
   }
   interaccion_menu();

   interaccion_productos();

   interaccion_menu_portada();

   inicio_catalogo_sliders();

   catalogo_sliders();

   colocar_titulares_al_scrollear();



   $('.titular_interactivo').each(function(){
      var titular = $(this);
      // titular.clone().removeClass('titular_interactivo').insertAfter(titular);

      titular.css({
         opacity:0,
         position: 'absolute'
      });

   });



   $('.scroll_on_load_target').each(function(){

      var scrollOnLoad = $(this).data('scroll_on_load');
      if( scrollOnLoad ) {
         $('html,body').animate({scrollTop: $(this).offset().top - $('#cabecera-titular').height()+10 })
      }
   })


});




function interaccion_menu() {

   $('#menu-boton').click( function(e){

      if( $(window).scrollTop() < $(window).height() / 10 && ! $('#menu').hasClass('activado') ) {

         $('#menu').animate({

            marginTop: ( ( $(window).height() - $('#cabecera').height() ) * -1 )

         }, function(){

            $(this).addClass('activado');

         })

      }

      return false;

   });


   $(window).on('scroll', function(){

      if( ! scrolling ) {

         scrolling = setTimeout(function(){

            if( $('#menu').hasClass('activado') ) {

               if( ! $('#menu .sticky').hasClass('is-stuck') ) {

                  $('#menu').css({
                     marginTop: ( $(window).scrollTop() - $('#principal').offset().top )
                  }, 100 );

               } else {

                  $('#menu').css({
                     marginTop: 0
                  }).removeClass('activado');

               }

            }


            colocar_titulares_al_scrollear();


            scrolling = 0;

         }, 50 );

      }

   })

}


function interaccion_productos() {
   $('.publicacion-comprar').click(function(){
      return false;
   })
}



// sliders de catalogo inicio
function inicio_catalogo_sliders() {

   $('#inicio-novedades').slick({

      dots: true,
      arrows: true,
      infinite: true,
      speed: 800,
      // fade: true,
      centerMode: true,
      centerPadding: '3vw',
      autoplay: true,
      autoplaySpeed: 3000,
      // cssEase: 'swing',
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
         {
            breakpoint: 768,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
               centerPadding: '2vw',
            }
         },
         {
            breakpoint: 640,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1,
               centerPadding: '1vw',
            }
         }
      ]

   });

}



function interaccion_menu_portada() {
   if( $('.boton-scroll').length > 0 ) {
      $('.boton-scroll').click(function(){

         var targetID = $(this).data('scroll_to');

         $('html,body').animate({
            scrollTop: $('[data-scroll_target="'+targetID+'"]').offset().top
         });

      });
   }
}





function catalogo_sliders() {

   if($('.catalogo-seccion').length>0) {

      $('.catalogo-seccion .elementos').each(function(){

         var columnas = $(this).data('columnas');


         $(this).slick({
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

      })

   }

}




var ultimo_contenedor_scrolleado;
var contenedor_actual;
var contenedores_activos = [];

function colocar_titulares_al_scrollear() {


   $('.contenedor_titular_interactivo').on('appear',function(event, $all_appeared_elements){

      contenedor_actual = $(event.target);

      if( contenedores_activos.length == 0 )
         colocar_titular_arriba( contenedor_actual );

      if( getIndex( contenedor_actual.attr('id'), contenedores_activos ) == -1 )
         contenedores_activos.push( contenedor_actual.attr('id') );

   })


   $('.contenedor_titular_interactivo').on('disappear',function(event, $all_appeared_elements){

      contenedor = $(event.target);

      var borrar = getIndex( contenedor.attr('id'), contenedores_activos );

      if(borrar!=-1)
         contenedores_activos.splice( borrar, 1 );

      for(i in contenedores_activos ) {
         colocar_titular_arriba( $( '#'+contenedores_activos[i]) );
      }

   })


}



function getIndex( item, array ) {

   for( i in array )
      if( array[i] == item )
         return i;
   return -1;
}

function colocar_titular_arriba( contenedor ){

   var titular_original = contenedor.find('.titular_interactivo');

   if( ! titular_original.hasClass('arriba') ) {

      // desactivar otro titular que pudiera estar arriba
      $('.arriba').removeClass('arriba');

      titular_original.addClass('arriba');
      var titular_nuevo = titular_original.clone().removeClass('titular_interactivo arriba').detach();
      $( '#cabecera-titular' ).html( titular_nuevo );
      u.vcenter( '#cabecera-titular h1' )
      titular_nuevo.animate({opacity:1});

      ultimo_contenedor_scrolleado = contenedor;

   }
}
