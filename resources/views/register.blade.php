<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    @vite('resources/css/app.css') <!-- Si estás usando Vite -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md w-80">
        @csrf
        <h1 class="text-xl font-bold mb-4 text-center">Registrar cuenta</h1>

        <input type="text" name="name" placeholder="Nombre" required class="w-full mb-3 p-2 border rounded" />

        <input type="text" name="lastname" placeholder="Apellido" required class="w-full mb-3 p-2 border rounded" />

        <input type="email" name="email" placeholder="Email" required class="w-full mb-3 p-2 border rounded" />

        <input type="password" name="password" placeholder="Contraseña" required class="w-full mb-3 p-2 border rounded" />

        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required class="w-full mb-4 p-2 border rounded" />

        <label for="rol">Introduce el rol</label>
        <select name="rol" id="rol">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
            Registrarse
        </button>
    </form>
</body>
</html>
