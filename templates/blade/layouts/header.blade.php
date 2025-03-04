<meta charset="{{ $charset ?? 'UTF-8' }}">
<title>@yield('title', 'Aplicación')</title>

@include('components.headers.meta', ['charset' => $charset ?? 'UTF-8'])
@include('components.headers.link', ['href' => 'css/app.css'])

@yield('head')