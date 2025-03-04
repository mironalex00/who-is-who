<html lang="es">
<head>
    @include('layouts.header')
</head>
<body>    
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    @yield('scripts')
</body>
</html>