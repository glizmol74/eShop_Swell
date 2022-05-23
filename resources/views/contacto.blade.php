@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <syscontacto /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <syscontacto /> </sys-header> 
        @endauth
    @endif
   
    
    <sys-footer></sys-footer>
    
@endsection