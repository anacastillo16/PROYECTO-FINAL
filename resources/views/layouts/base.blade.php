<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TFG')</title>

    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 body-bg">

    {{-- Cabecera (usuario, trabajador o pública) --}}
    @hasSection('header')
        @yield('header')
    @endif

    {{-- Contenido principal --}}
    <main class="container flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer común --}}
    @include('layouts.footer')

    @stack('scripts')
</body>
</html>
