@extends('layouts.main')

@section('title', 'Página con Indentación')

{{--
@section('styles')
    @include('components.headers.link', [
        'href' => 'styles/custom.css',
        'rel' => 'stylesheet'
    ])
@endsection
--}}

@section('content')
    <div class="content">
        <h1>Hola desde Blade en Symfony</h1>
        <a href="https://www.google.com" rel="__blank">
            Entrar a google
        </a>
    </div>
@endsection

@section('scripts')
    @include('components.script', [
        'src' => 'js/app.js',
        'defer' => true
    ])
@endsection