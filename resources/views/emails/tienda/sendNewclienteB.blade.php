@component('emails.message')

    <h1 class="sys-title">Bienvenidos </h1>
    <hr class="sys-separador">
    

    <br />
    <h2 class="sys-subtitle">Sr(a) :  <b>{{ $data['cliente']->cli_razon }}  </b></h2> 
    <div class="sys-body">
        <br />
        <p>     Su solicitud de acceso para ingresar al Sistema de <b>eShop-Swell</b> es el siguiente:</p>
        <p>  Usuario : <b>{{ $data['correo'] }}</b></p>
        <p>  Contraseña: <b>{{ $data['passwd'] }}</b></p>
        <p>  Estado de tu Cuenta : <b>{{ $data['estado'] }}</b></p>
        <br />
        <p>  Su codigo de Verificación es : <b> {{ $data['cliente']->codigo }}  </b>  </p>
        <br />
        <br />
        <p> <b style="color:red">   IMPORTANTE : </b> Por su seguridad, le recomendamos cambiar su Contraseña periodicamente.</p>
        <p>  El presente correo es enviado automaticamente por nuestro sistema, por favor, no responda ni reenvìe mensaje a esta dirección.</p>
    </div>
    <br />
    <br />
    <p>Saludos,</p>
    <p><b>eShop-Swell</b></p>
    <br />
    <br />
    <br />

    @component('emails.pre_footer')
    @endcomponet
@endcomponent