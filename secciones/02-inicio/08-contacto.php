<?php
global $pagina_superior;
global $html_id;
$ID = get_the_ID();
$pagina_superior = get_page_by_title( "Contacto" );

$paginas = get_pages( array('parent'=>$pagina_superior->ID));
$html_id = strtolower( str_replace(" ","_",get_post($pagina_superior->post_parent)->post_title) );
$html_id .= '-';
$html_id .= strtolower( str_replace(" ","_",$pagina_superior->post_title) );
$html_id = iconv('UTF-8', 'ASCII//TRANSLIT', $html_id);
$html_id = preg_replace('/[^A-Za-z0-9\-]/', '', $html_id );

?>

<section id="<?php echo $html_id; ?>" class="contenedor_titular_interactivo columns p5 m0 h_80vh">

   <h1 class="titular_interactivo">Contacto</h1>

   <div id="<?php echo $html_id; ?>-contenido" class="columns">

      <div id="inicio-contacto-informacion" class="small-12 large-5 columns p5 h_80 h_md_40 h_sm_30">

         <div class="vcenter">
            <ul class="small-12 h_80 text-left fontXL font_md_L font_sm_M vcenter">
               <li class="small-12 h_a"><i class="fa fa-home">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt sunt ullam, minima.</i></li>
               <br/>
               <li class="small-12 h_a"><i class="fa fa-phone">+ 55 (55) 55555555</i></li>
               <br/>
               <li class="small-12 h_a"><i class="fa fa-home">contacto@crater.com</i></li>
               <br/>
            </ul>
         </div>


      </div>

      <div id="inicio-contacto-formulario" class="small-12 large-7 columns p3 h_80 h_md_40 h_sm_50">

         <form class="">
            <div class="row">
               <div class="large-12 columns h_30">
                  <label>Nombre
                     <input type="text" placeholder="Jimi Hendrix" />
                  </label>
               </div>
            </div>
            <div class="row">
               <div class="large-12 columns h_30">
                  <label>Correo
                     <input type="text" placeholder="jimi@hendrix.com" />
                  </label>
               </div>
            </div>
            <div class="row">
               <div class="large-12 columns h_30">
                  <label>Asunto
                     <input type="text" placeholder="Musica" />
                  </label>
               </div>
            </div>
            <div class="row">
               <div class="large-12 columns">
                  <label>Mensaje
                     <textarea name="mensaje" rows="4" cols="40" placeholder="Deja tu mensaje"></textarea>
                  </label>
               </div>
            </div>



         </form>



      </div>


   </div>




</section>
