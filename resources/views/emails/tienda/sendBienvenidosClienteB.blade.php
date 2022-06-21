@component('emails.message')

    <h1 class="sys-title">Bienvenidos </h1>
    <hr class="sys-separador">
    

    <br />
    <h2 class="sys-subtitle">Sr(a):  <b>{{ $data['cliente']->cli_razon }}  </b></h2> 
    <div class="sys-body">
        <br />
        <p>  El equipo de <b style="color:pink;">eShop Swell</b> te damos la Bienvenida.</p>
        <p> </p>
        <p>  Nuestra Misión es hacer llegar productos de alta calidad y confiabilidad a cada cliente, facilitando la operación con cada uno de ellos.</p>
        <br />
        <p>  Agregamos Valor en toda la cadena adaptándonos a -*las necesidades de nuestros clientes, brindandoles un excelente servicio. </p>
        <br />
        <br />
        <p> </p>
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