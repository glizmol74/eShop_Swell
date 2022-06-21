@component('emails.message')

    <h1 class="sys-title">Bienvenidos </h1>
    <hr class="sys-separador">
    

    <br />
    <h2 class="sys-subtitle">Hola! <b>{{ $data['cliente']->cli_razon }}  </b></h2> 
    <div class="sys-body">
        <br />
        <br />
        <p> Su  codigo de Verificación es : <b> {{ $data['cliente']->codigo }}  </b>  </p>
        <br />
        <br />
        <p> Si Usted no creó una cuenta nueva, no es necesario realizar una Acción.</p>
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