<div class="sys-body">
    <hr class="separate-dashed">
    <p class="sys-pre_footer"> Visite nuestro sitio web para que conozcan un poco mas acerca de nosotros.</p>

    @component('mail::button',[ 'url' => config('app.url')] ) 
        Visita nuestro Sitio Web
    @endcomponent

    <br />
    <br />
    <br />
    <br />
    <p class="sys-pre_footer"> No dejes de seguirnos en las redes sociales....</p>
    <p class="sys-pre_footer">
        <a href="https://www.facebook.com/swellhigieneylimpieza"><img src="{{url('/storage/images/fb.svg')}}" class="fb" alt="{{url('/storage/images/fb.svg')}}" width="20px"></a>&nbsp;&nbsp;
        <a href=""><img src="{{url('/storage/images/ig.svg')}}" class="ig" alt="{{url('/storage/images/fb.svg')}}" width="20px"></a>
    </p>
</div>