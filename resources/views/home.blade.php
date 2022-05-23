@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        @auth
            <sys-header :xcolor="'green'"></sys-header> 
        @else
            <sys-header :xcolor="'red'"></sys-header> 
        @endauth
    @endif
   <div></div>
    <sys-footer></sys-footer>
    
@endsection
