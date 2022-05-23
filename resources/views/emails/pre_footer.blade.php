<div class="sys-body">
    <hr class="separate-dashed">
    <p class="sys-pre_footer"> Visite nuestro sitio web y encuentra todas las ofertas que tenemos para usted.</p>

    @component('mail::button',[ 'url' => config('app.url')] ) 
        VISITAR Sitio
    @endcomponent

    <br />
    <br />
    <br />
    <br />
    <p class="sys-pre_footer"> No dejes de seguirnos en las redes sociales..</p>
    <p class="sys-pre_footer">
        <img src="{{url('http://192.168.0.111/storage/images/fb.svg')}}" class="fb" alt="Laravel Logo" width="30px">&nbsp;&nbsp;
        <img src="{{url('/storage/images/fb.svg')}}" class="fb" alt="Laravel Logo" width="30px">
    </p>
</div>