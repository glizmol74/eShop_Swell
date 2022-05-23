@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name')}}
        @endcomponent
    @endslot

    {{--  Body  --}}
    {{ $slot }}

    {{-- Footer  --}}
    @slot('footer')

        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. Todos los Derechos reservador.

            Si no desea recibir más correos, puede [modificar tus preferencias][unsuscribe]. 

            [unsubscribe]: {{ url('/configuracion')}}
        @endcomponent
    @endslot
    
@endcomponent