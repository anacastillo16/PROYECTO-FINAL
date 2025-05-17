<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm p-4" style="width: 380px; border-radius: 12px;">
        @yield('content')
    </div>

</body>
</html>
