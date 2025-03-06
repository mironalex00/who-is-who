    @yield('head')
    <meta charset="{{ $charset ?? 'UTF-8' }}">
    <title>@yield('title', 'Application')</title>
    <!-- Componentes con indentación -->
    @include('components.headers.meta', [
        'name' => 'description',
        'content' => 'Descripción por defecto'
    ])
    @include('components.headers.link', [
        'href' => 'assets/styles/app.css',
        'rel' => 'stylesheet'
    ])
    <!-- Estilos -->
    @yield('styles')