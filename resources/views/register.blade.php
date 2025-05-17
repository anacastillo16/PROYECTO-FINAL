@extends('layouts.auth')

@section('title', 'Registro')

@section('content')
    <h2 class="mb-4 text-center fw-bold text-primary">Registrar cuenta</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Nombre" required
            class="form-control mb-3" />

        <input type="text" name="lastname" placeholder="Apellido" required
            class="form-control mb-3" />

        <input type="email" name="email" placeholder="Email" required
            class="form-control mb-3" />

        <input type="password" name="password" placeholder="Contraseña" required
            class="form-control mb-3" />

        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required
            class="form-control mb-4" />

        <label for="rol" class="form-label fw-semibold">Selecciona un rol</label>
        <select name="rol" id="rol" class="form-select mb-4">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>

    <p class="mt-3 text-center">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="text-primary fw-semibold">Inicia sesión</a>
    </p>
@endsection