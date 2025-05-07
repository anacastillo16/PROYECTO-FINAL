<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow-md w-80">
        @csrf
        <h1 class="text-xl font-bold mb-4 text-center">Iniciar sesión</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <input type="email" name="email" placeholder="Email" required
            class="w-full mb-3 p-2 border rounded" />

        <input type="password" name="password" placeholder="Contraseña" required
            class="w-full mb-4 p-2 border rounded" />

        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
            Entrar
        </button>

        <div>
            <p>¿No tienes cuenta?</p>
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Regístrate</a>
        </div>
    </form>
</body>
</html>
