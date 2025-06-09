@extends('layouts.base')

@section('title', 'Registro')

@section('header')
    <!-- Cabecera pública -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary py-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Favicon como logo -->
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2 text-white" href="{{ route('index.public') }}">
                    <img src="{{ asset('favicon.ico') }}" alt="Logo Biblioteca" width="30" height="30">
                    Biblioteca
                </a>

                <!-- Botones -->
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Registrarse</a>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h2 class="mb-4 text-center fw-bold text-primary">Registrar cuenta</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Apellido -->
                    <div class="mb-3">
                        <input type="text" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}" required
                            class="form-control @error('lastname') is-invalid @enderror">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
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
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirmación de contraseña -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirmar Contraseña" required
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                            <button class="btn btn-outline-secondary toggle-password" type="button"
                                data-target="password_confirmation">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Rol -->
                    <div class="mb-4">
                        <select name="rol" id="rol" class="form-select @error('rol') is-invalid @enderror" required>
                            <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Selecciona un rol</option>
                            <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('rol') == 'user' ? 'selected' : '' }}>Usuario</option>
                        </select>
                        @error('rol')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </form>

                <p class="mt-3 text-center">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-primary fw-semibold">Inicia sesión</a>
                </p>
            </div>
        </div>
    </div>
@endsection
