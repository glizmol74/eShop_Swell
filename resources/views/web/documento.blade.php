@extends('layouts.cliente')

@section('content')
    <menu-top-asside :color_html_b="'{{ config('app.color_html_b') }}'" :color_html="'{{ config('app.color_html') }}'" :name_html="'{{ config('app.name_html') }}'" :name_html_strong="'{{ config('app.name_html_strong') }}'">
      <sys-listado-documento />
    </menu-top-asside>
@endsection