@extends('layouts.base')

@section('title', 'Editar Perfil')

@if (Auth::user()->rol === 'admin')
    @include('layouts.trabajador.header')
@else
    @include('layouts.usuario.header')
@endif

@section('content')
<main class="container my-5" style="max-width: 700px;">
    <h2 class="mb-4 text-center fw-bold" style="color: #4C956C;">Editar perfil</h2>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-4" style="background-color: #F7FAF5; border-radius: 0.5rem; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <!-- Formulario de edición -->
                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label" style="color: #406343;">Nombre</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required
                            style="border-color: #4C956C;">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label" style="color: #406343;">Apellidos</label>
                        <input type="text" id="lastname" name="lastname"
                            class="form-control @error('lastname') is-invalid @enderror"
                            value="{{ old('lastname', $user->lastname) }}" required
                            style="border-color: #4C956C;">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #406343;">Correo electrónico</label>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required
                            style="border-color: #4C956C;">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-4">
                        <label for="password" class="form-label" style="color: #406343;">Nueva contraseña (opcional)</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                style="border-color: #4C956C;">
                            <button class="btn btn-outline-success toggle-password" type="button"
                                data-target="password" style="color: #4C956C;">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label" style="color: #406343;">Confirmar nueva contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                autocomplete="new-password" style="border-color: #4C956C;">
                            <button class="btn btn-outline-success toggle-password" type="button"
                                data-target="password_confirmation" style="color: #4C956C;">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        @if (Auth::user()->rol === 'admin')
                            <a href="{{ route('index.trabajador') }}" class="btn" style="background-color: #406343; color: #F7FAF5; font-weight: 600; border-radius: 0.4rem; padding: 0.5rem 1.5rem;">Volver</a>
                        @else
                            <a href="{{ route('index.usuario') }}" class="btn" style="background-color: #406343; color: #F7FAF5; font-weight: 600; border-radius: 0.4rem; padding: 0.5rem 1.5rem;">Volver</a>
                        @endif
                        <button type="submit" style="background-color: #4C956C; border: none; color: #F7FAF5; font-weight: 700; padding: 0.5rem 1.8rem; border-radius: 0.4rem;">Guardar cambios</button>
                    </div>
                </form>

                <!-- Botón eliminar cuenta -->
                <hr class="my-4">
                <div class="text-end">
                    <button class="btn" data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal"
                        style="background-color: transparent; border: 2px solid #E57373; color: #E57373; font-weight: 600; border-radius: 0.4rem; padding: 0.4rem 1.2rem;">
                        Eliminar cuenta
                    </button>
                </div>

                <!-- Modal de confirmación -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 0.5rem;">
                            <div class="modal-header" style="background-color: #4C956C; color: #F7FAF5;">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás segura?</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body" style="color: #406343;">
                                Esta acción eliminará tu cuenta de forma permanente. ¿Deseas continuar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                    style="background-color: #406343; color: #F7FAF5; font-weight: 600; border-radius: 0.4rem; padding: 0.4rem 1.2rem;">Cancelar</button>

                                <form action="{{ route('perfil.destroy') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #E57373; border: none; color: #F7FAF5; font-weight: 600; padding: 0.4rem 1.4rem; border-radius: 0.4rem;">Sí, eliminar cuenta</button>
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

@section('scripts')
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
</script>
@endsection
