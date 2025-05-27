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
            <input type="password" name="password" placeholder="Contraseña" required
                class="form-control @error('password') is-invalid @enderror" autofocus />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>

    <p class="mt-3 text-center">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="text-primary fw-semibold">Regístrate</a>
    </p>
@endsection