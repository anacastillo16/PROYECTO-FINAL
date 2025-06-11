@extends('layouts.base')

@section('title', 'Editar Perfil')

@section('header')
    @if (Auth::user()->rol === 'admin')
        @include('layouts.trabajador.header')
    @else
        @include('layouts.usuario.header')
    @endif
@endsection

@section('content')
<main class="container my-5" style="max-width: 700px;">
    <div class="text-center mb-4">
        <h2>Editar perfil</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-4" style="background-color: #F7FAF5; border-radius: 0.5rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <!-- Formulario de edición -->
                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label text-main">Nombre</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required
                            style="border-color: #6CBF84;">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label text-main">Apellidos</label>
                        <input type="text" id="lastname" name="lastname"
                            class="form-control @error('lastname') is-invalid @enderror"
                            value="{{ old('lastname', $user->lastname) }}" required
                            style="border-color: #6CBF84;">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-main">Correo electrónico</label>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required
                            style="border-color: #6CBF84;">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-4">
                        <label for="password" class="form-label text-main">Nueva contraseña (opcional)</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                style="border-color: #6CBF84;">
                            <span class="input-group-text bg-white border-start-0" style="cursor: pointer; border-color: #6CBF84;">
                                <button type="button" class="btn p-0 m-0 toggle-password" data-target="password" style="color: #4A4A4A;">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label text-main">Confirmar nueva contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                autocomplete="new-password" style="border-color: #6CBF84;">
                            <span class="input-group-text bg-white border-start-0" style="cursor: pointer; border-color: #6CBF84;">
                                <button type="button" class="btn p-0 m-0 toggle-password" data-target="password_confirmation" style="color: #4A4A4A;">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 mt-4">
                        <a href="{{ Auth::user()->rol === 'admin' ? route('index.trabajador') : route('index.usuario') }}"
                            class="button-secondary-custom w-100">Volver</a>
                        <button type="submit" class="button-primary-custom w-100">Guardar cambios</button>
                    </div>
                </form>

                <!-- Botón eliminar cuenta -->
                <hr class="my-4">
                <div class="text-center text-sm-end">
                    <button class="btn w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        style="background-color: #E26A6A; color: white;">
                        Eliminar cuenta
                    </button>
                </div>

                <!-- Modal de confirmación -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: #F7FAF5;">
                            <div class="modal-header">
                                <h5 class="modal-title text-main" id="confirmDeleteModalLabel">¿Estás segura?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                Esta acción eliminará tu cuenta de forma permanente. ¿Deseas continuar?
                            </div>
                            <div class="modal-footer flex-column flex-sm-row justify-content-end gap-2">
                                <button type="button" class="button-secondary-custom w-100 w-sm-auto" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('perfil.destroy') }}" method="POST" class="w-100 w-sm-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn w-100 w-sm-auto" style="background-color: #E26A6A;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
