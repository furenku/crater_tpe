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

});




function interaccion_menu() {

   $('#menu-boton').click( function(e){

      if( ! $('#menu').hasClass('activado') ) {

         $('#menu').animate({

            marginTop: ( $(window).height() * -1 )

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

                  $('#menu').removeClass('activado');

               }

            }

            scrolling = 0;

         }, 150 );

      }

   })

}
