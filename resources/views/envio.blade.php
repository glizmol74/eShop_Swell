@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <sys-envio /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <sys-envio /> </sys-header> 
        @endauth
    @endif
   
    
    <sys-footer></sys-footer>
    
@endsection