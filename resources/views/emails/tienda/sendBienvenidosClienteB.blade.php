@component('emails.message')

    <!-- <h1 class="sys-title">Bienvenidos </h1>
    <hr class="sys-separador">
     -->

    <br />
    <h2 class="sys-subtitle">Hola  <b>{{ $data['cliente']->cli_razon }},  </b></h2> 
    <div class="sys-body">
        <br />
        <p>  ¡Bienvenido a <b style="color:pink;">SWELL</b>!</p>
        <p>   Nos encanta tenerte acá!. Esperamos te sumes como cliente y pruebes la calidad de productos y servicios que ofrecemos. </p>
        <p>  Somos una empresa que lleva 19 años en el mercado de la limpieza e higiene Industrial, Empresarial y Hogareña, fabricando mas de 60 productos en distintos formatos de alta calidad y eficiencias.</p>
        <p>  Nuestro equipo trabajara a tu lado para dar solución a tus necesidades y además te podemos ayudar a desarrollar productos especificos para tu empresa. </p>
        <br />
    </div>

    <p>Saludos,</p>
    <p><b>Equipo Swell</b></p>
    <br />
    <br />
    <p>  El presente correo es enviado automáticamente por nuestro sistema, por favor, no responda ni reenvíe mensaje a esta dirección.</p>
    <p>  Si desea comunicarse con nosotros visite nuestro sitio web y allí encontrara un canal de contacto Personalizado</p>

    @component('emails.pre_footer')
    @endcomponet
@endcomponent