<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div style="width: 380px; border-radius: 12px;">
        @yield('content')
    </div>
    
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', () => {
                const inputId = button.getAttribute('data-target');
                const input = document.getElementById(inputId);
                const icon = button.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        });
    </script>

</body>
</html>
