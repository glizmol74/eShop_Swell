@component('emails.message')

    <h1 class="sys-title"> Nueva Consulta en Sitio WEB</h1>
    <hr class="sys-separador">
    <h2> Este correo no tiene enlaces. No haga click en los links</h2>

    <br />
    <h2 class="sys-subtitle">Hola!</h2> 
    <div class="sys-body">
        <br />
        <p>Recibimos una nueva consulta a traves del sitio web.</p>
        <br />
        <p><b>Esta dirigida A :</b> {{$data->for_pregunta}}</p>
        <br />
        <p><b>Nombre    :</b>  {{$data->for_name}}</p>
        <p><b>Correo    :</b>  {{$data->for_email}}</p>
        <p><b>Teléfono  :</b>  {{$data->for_telefono}}</p>
        <br />
        <p><b>Mensaje   :</b>  {{$data->for_comentarios}}</p>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />

    @component('emails.pre_footer')
    @endcomponet
@endcomponent