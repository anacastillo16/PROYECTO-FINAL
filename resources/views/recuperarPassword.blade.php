@extends('layouts.auth')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="container my-5 body-bg text-main" style="max-width: 500px; border-radius: 8px; padding: 2rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 class="mb-4 text-center fw-bold text-main">Recuperar contraseña</h2>
        <p class="text-center">Introduce tu correo para establecer una nueva contraseña.</p>

        @if(session('success'))
            <div class="alert-success-custom mt-3 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('recuperar.submit') }}" class="mt-3">
            @csrf

            {{-- Email --}}
            <div class="mb-3 px-4">
                <input type="email" name="email" placeholder="Correo electrónico"
                    class="form-control @error('email') is-invalid @enderror"
                    required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nueva contraseña con ojito --}}
            <div class="mb-3 px-4">
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Nueva contraseña"
                        class="form-control @error('password') is-invalid @enderror">
                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                        <button type="button" class="btn p-0 m-0 toggle-password" data-target="password" style="background: transparent; border: none;">
                            <i class="bi bi-eye text-main"></i>
                        </button>
                    </span>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div class="mb-4 px-4">
                <input type="password" name="password_confirmation" placeholder="Confirmar nueva contraseña"
                    class="form-control" required>
            </div>

            <div class="px-4">
                <button type="submit" class="button-primary-custom w-100">Actualizar contraseña</button>
            </div>

            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" class="link-custom">Volver al inicio de sesión</a>
            </p>
        </form>
    </div>
@endsection