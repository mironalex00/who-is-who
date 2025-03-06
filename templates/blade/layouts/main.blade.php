<!DOCTYPE html>
<html lang="{{ @config('app.locale') }}">
<head>
    @include('layouts.header')
</head>
<body>
    @include('layouts.navigation')
    <main class="container">
        @yield('content')
    </main>
    @include('layouts.footer')
    @yield('scripts')
</body>
</html>