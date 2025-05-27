@extends('layouts.auth')

@section('title', 'Registro')

@section('content')
    <h2 class="mb-4 text-center fw-bold text-primary">Registrar cuenta</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror" required >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
       
        <div class="mb-4">
        <input type="text" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}" required class="form-control @error('lastname') is-invalid @enderror" required >
            @error('lastname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" required >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Contraseña" required
                class="form-control @error('password') is-invalid @enderror" required >
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
       <div class="input-group mb-4">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña"
            required class="form-control" />
            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        
        <div class="mb-4">
            <select name="rol" id="rol"   class="form-select @error('rol') is-invalid @enderror" required>
                <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Selecciona un rol</option>
                <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('rol') == 'user' ? 'selected' : '' }}>User</option>
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
@endsection