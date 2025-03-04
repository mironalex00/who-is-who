@extends('layouts.main')

@section('head')
    @include('components.headers.link', ['href' => 'css/hello-world.css'])
@endsection

@section('title', 'App - Answers')

@section('content')
    <h1>Hola desde Blade en Symfony</h1>
@endsection

@section('scripts')
    @include('components.script', ['src' => 'js/custom.js'])
@endsection