@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <sys-comocomprar /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <sys-comocomprar /> </sys-header> 
        @endauth
    @endif
   
    
    <sys-footer></sys-footer>
    
@endsection