@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')

    <h1 class="text-2xl font-bold text-center">Iniciar sesión</h1>
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-4 bg-gray-100 p-4 rounded-md">
        @csrf

        <!-- Email -->
        <div>
            <input type="email" name="email" placeholder="Email"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />

        </div>

        <!-- Password -->
        <div>
            <input type="password" name="password" placeholder="Contraseña"
                class="w-full mt-4 border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />
        </div>

        <button type="submit"
            class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Iniciar sesión
        </button>
    </form>
    <div>
        <p class="text-center text-sm mt-4">¿No tienes cuenta?</p>
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate</a>
    </div>
@endsection