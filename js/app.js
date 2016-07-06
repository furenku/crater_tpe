var scrolling = 0;

u = new FrontEndUtils();

$(document).ready(function(){

   $(document).foundation();

   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({
      fill:false
   });

   u.vcenter();

   interaccion_menu();

   interaccion_productos();

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

            scrolling = 0;

         }, 50 );

      }

   })

}


function interaccion_productos() {
   $('.publicacion-comprar').click(function(){
      alert( $(this).parent().parent().parent().data('id') )
      return false;
   })
}
