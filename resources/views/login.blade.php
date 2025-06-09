@extends('layouts.base')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="container my-5 body-bg text-main" style="max-width: 500px; border-radius: 8px; padding: 2rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 class="mb-4 text-center fw-bold" style="color: #4A4A4A;">Iniciar Sesión</h2>

        {{-- Mensaje de éxito al cambiar la contraseña --}}
        @if(session('success'))
            <div class="alert-success-custom text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus
                    class="input-custom @error('email') input-invalid-custom @enderror" />
                @error('email')
                    <div class="error-text-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-3">
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Contraseña" required
                        class="input-custom @error('password') input-invalid-custom @enderror" style="padding-right: 2.5rem;">
                    <button type="button" class="button-secondary-custom toggle-password" data-target="password" 
                        style="position: absolute; top: 50%; right: 0.5rem; transform: translateY(-50%); border: none; background: transparent; padding: 0;">
                        <i class="bi bi-eye" style="color: #4A4A4A;"></i>
                    </button>
                </div>
                @error('password')
                    <div class="error-text-custom mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Recuérdame --}}
            <div class="form-check mb-3 text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ms-1 text-main" for="remember">
                    Recuérdame
                </label>
            </div>

            {{-- Botón login --}}
            <button type="submit" class="button-primary-custom w-100">Iniciar sesión</button>

            {{-- ¿Olvidaste tu contraseña? --}}
            <p class="mt-3 text-center">
                <a href="{{ route('recuperar.form') }}" class="text-decoration-none text-secondary-custom fw-semibold">
                    ¿Olvidaste tu contraseña?
                </a>
            </p>
        </form>

        {{-- Registro --}}
        <p class="mt-3 text-center">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-secondary-custom fw-semibold">Regístrate</a>
        </p>
    </div>
@endsection
