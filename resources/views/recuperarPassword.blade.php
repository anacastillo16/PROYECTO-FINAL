@extends('layouts.auth')

@section('title', 'Recuperar Contraseña')

@section('content')
    <h2 class="mb-4 text-center fw-bold text-primary">Recuperar contraseña</h2>
    <p class="text-center">Introduce tu correo para establecer una nueva contraseña.</p>

    @if(session('success'))
        <div class="alert alert-success mt-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('recuperar.submit') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" placeholder="Correo electrónico" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <input type="password" name="password" placeholder="Nueva contraseña" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <input type="password" name="password_confirmation" placeholder="Confirmar nueva contraseña" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Actualizar contraseña</button>

        <p class="mt-3 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-secondary">
                Volver al inicio de sesión
            </a>
        </p>
    </form>
@endsection
