@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <sys-nosotros /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <sys-nosotros /> </sys-header> 
        @endauth
    @endif
   
    
    <sys-footer></sys-footer>
    
@endsection