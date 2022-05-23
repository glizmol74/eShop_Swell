@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <sys-category /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <sys-category /> </sys-header> 
        @endauth
    @endif
   
    
    <sys-footer></sys-footer>
    
@endsection