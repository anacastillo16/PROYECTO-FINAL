@extends('layouts.base')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="container my-5 body-bg text-main" style="max-width: 500px; border-radius: 8px; padding: 2rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 class="mb-4 text-center fw-bold" style="color: #4A4A4A;">Recuperar contraseña</h2>
        <p class="text-center">Introduce tu correo para establecer una nueva contraseña.</p>

        @if(session('success'))
            <div class="alert-success-custom mt-3 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('recuperar.submit') }}" class="mt-3">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <input type="email" name="email" placeholder="Correo electrónico"
                    class="input-custom @error('email') input-invalid-custom @enderror" required value="{{ old('email') }}">
                @error('email')
                    <div class="error-text-custom">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nueva contraseña --}}
            <div class="mb-3">
                <input type="password" name="password" placeholder="Nueva contraseña"
                    class="input-custom @error('password') input-invalid-custom @enderror" required>
                @error('password')
                    <div class="error-text-custom">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirmación --}}
            <div class="mb-4">
                <input type="password" name="password_confirmation" placeholder="Confirmar nueva contraseña"
                    class="input-custom" required>
            </div>

            <button type="submit" class="button-primary-custom w-100">Actualizar contraseña</button>

            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none text-secondary-custom">
                    Volver al inicio de sesión
                </a>
            </p>
        </form>
    </div>
@endsection
