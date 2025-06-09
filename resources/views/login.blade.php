@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="container my-5 body-bg text-main"
        style="max-width: 500px; border-radius: 8px; padding: 2rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 class="mb-4 text-center fw-bold text-main">Iniciar Sesión</h2>

        {{-- Mensaje de éxito al cambiar la contraseña --}}
        @if(session('success'))
            <div class="alert-success-custom text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3 px-4">
                <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required
                    autofocus class="form-control @error('email') is-invalid @enderror" />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-3 px-4">
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Contraseña" required
                        class="form-control @error('password') is-invalid @enderror"
                        style="padding-right: 2.5rem;">

                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                        <button type="button" class="btn p-0 m-0 toggle-password" data-target="password" style="background: transparent; border: none;">
                            <i class="bi bi-eye text-main"></i>
                        </button>
                    </span>
                </div>

                @error('password')
                    <div class="invalid-feedback mt-1 d-block">
                        {{ $message }}
                    </div>
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
                <a href="{{ route('recuperar.form') }}" class="link-custom"> ¿Olvidaste tu contraseña?</a>
            </p>
        </form>

        {{-- Registro --}}
        <p class="mt-3 text-center text-main">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="link-custom">Regístrate</a>
        </p>
    </div>
@endsection