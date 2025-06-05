@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
    <h2 class="mb-4 text-center fw-bold text-primary">Iniciar Sesión</h2>

    {{-- Mensaje de éxito al cambiar la contraseña --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required
                class="form-control @error('email') is-invalid @enderror" autofocus />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Contraseña --}}
        <div class="mb-4">
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Contraseña" required
                    class="form-control @error('password') is-invalid @enderror">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                    <i class="bi bi-eye"></i>
                </button> 
            </div>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Recuérdame --}}
        <div class="form-check mb-3 text-start">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label ms-1" for="remember">
                Recuérdame
            </label>
        </div>

        {{-- Botón login --}}
        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>

        {{-- ¿Olvidaste tu contraseña? --}}
        <p class="mt-3 text-center">
            <a href="{{ route('recuperar.form') }}" class="text-decoration-none text-primary fw-semibold">
                ¿Olvidaste tu contraseña?
            </a>
        </p>
    </form>

    {{-- Registro --}}
    <p class="mt-3 text-center">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="text-primary fw-semibold">Regístrate</a>
    </p>
@endsection