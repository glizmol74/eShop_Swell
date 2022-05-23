@component('emails.message')

    <h1 class="sys-title"> Nuevo Cliente Registrado desde el Sitio WEB</h1>
    <hr class="sys-separador">
    

    <br />
    <h2 class="sys-subtitle">Hola!</h2> 
    <div class="sys-body">
        <br />
        <br />
        <p><b>Nombre ó Razón Social :</b> {{ $data['cliente']->cli_razon }} </p>
        <p><b>Cuit :</b> {{ $data['cliente']->cli_cuit }} </p>
        <p><b>Correo     :</b> {{ $data['correo'] }} </p>
        <p><b>Teléfono   :</b> {{ $data['cliente']->cli_telefono }} </p>
        <p><b>Whatsapp   :</b> {{ $data['cliente']->cli_whatsapp }} </p>
        <p><b>Dirección  :</b> {{ $data['cliente']->cli_direccion }} </p>
        <p><b>Provincia  :</b> {{ $data['postal']->pro_nombre }} </p>
        <p><b>Localidad  :</b> {{ $data['postal']->loc_nombre }} </p>
        <p><b>Cod Postal :</b> {{ $data['postal']->loc_codigo_postal }} </p>
        <br />
        <p><b></b>  </p>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />

    @component('emails.pre_footer')
    @endcomponet
@endcomponent