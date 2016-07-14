var scrolling = 0;

u = new FrontEndUtils();

$(document).ready(function(){

  $(document).foundation();

  $('.imgLiquid.imgLiquidFill').imgLiquid();
  $('.imgLiquid.imgLiquidNoFill').imgLiquid({
    fill:false
  });

  u.vcenter();
  u.shareH();

  interaccion_menu();

  interaccion_productos();

  interaccion_menu_portada();

  inicio_catalogo_sliders();

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
    return false;
  })
}



// sliders de catalogo inicio
function inicio_catalogo_sliders() {

  // colecciones slider
  $('#inicio_catalogo_colecciones').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    // fade: true,
    centerMode: true,
    centerPadding: '7vw',
    autoplay: true,
    autoplaySpeed: 3000,
    // cssEase: 'swing',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [

      {
        breakpoint: 768,
        settings: {
          centerPadding: '1vw',
        }
      }
    ]
  });

  // ediciones unicas slider
  $('#inicio-catalogo-ediciones-unicas').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    // fade: true,
    centerMode: true,
    centerPadding: '7vw',
    autoplay: true,
    autoplaySpeed: 3000,
    // cssEase: 'swing',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [

      {
        breakpoint: 768,
        settings: {
          centerPadding: '1vw',
        }
      }
    ]
  });

  // proyectos especiales slider
  $('#inicio-catalogo-proyectos-especiales').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    // fade: true,
    centerMode: true,
    centerPadding: '7vw',
    autoplay: true,
    autoplaySpeed: 3000,
    // cssEase: 'swing',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [

      {
        breakpoint: 768,
        settings: {
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
