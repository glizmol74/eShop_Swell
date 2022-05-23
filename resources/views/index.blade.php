@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"> <sys-index /> </sys-header> 
        @else
            <sys-header :xcolor="'red'"> <sys-index /> </sys-header> 
        @endauth
    @endif
   
    <sys-footer></sys-footer>
    
@endsection
