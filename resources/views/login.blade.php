@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
    <h2 class="mb-4 text-center fw-bold text-primary">Iniciar Sesión</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                class="form-control @error('email') is-invalid @enderror" autofocus />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <div class="mb-4">
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Contraseña" required
                class="form-control @error('password') is-invalid @enderror" required >
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                    <i class="bi bi-eye"></i>
                </button> 
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Recuérdame
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>

    <p class="mt-3 text-center">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="text-primary fw-semibold">Regístrate</a>
    </p>
@endsection