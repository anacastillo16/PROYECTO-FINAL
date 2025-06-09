@extends('layouts.auth')

@section('title', 'Registro')

@section('content')
    <div class="container my-5 body-bg text-main" style="max-width: 500px; border-radius: 8px; padding: 2rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 class="mb-4 text-center fw-bold text-main">Registrar cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <input type="text" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}" required
                    class="form-control @error('lastname') is-invalid @enderror">
                @error('lastname')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Contraseña" required
                        class="form-control @error('password') is-invalid @enderror">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-3">
                <div class="input-group">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirmar Contraseña" required
                        class="form-control">
                    <button class="btn btn-outline-secondary toggle-password" type="button"
                        data-target="password_confirmation">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Rol -->
            <div class="mb-4">
                <select name="rol" id="rol" class="form-select @error('rol') is-invalid @enderror" required>
                    <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Selecciona un rol</option>
                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('rol') == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
                @error('rol')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button-primary-custom w-100">Registrarse</button>
        </form>

        <p class="mt-3 text-center text-main">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="link-custom">Inicia sesión</a>
        </p>
    </div>
@endsection