<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    @if (Auth::user()->rol === 'admin')
        @include('layouts.trabajador.header')
    @else
        @include('layouts.usuario.header')
    @endif


    <main class="container my-5">
        <h2 class="mb-4 text-center">Editar perfil</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <!-- Formulario de edición -->
                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" id="lastname" name="lastname"
                                class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ old('lastname', $user->lastname) }}" required>
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-4">
                            <label for="password" class="form-label">Nueva contraseña (opcional)</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    data-target="password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirmar contraseña --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                            <div class="input-group">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    autocomplete="new-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    data-target="password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-between mt-4">
                            @if (Auth::user()->rol === 'admin')
                                <a href="{{ route('index.trabajador') }}" class="btn btn-secondary">Volver</a>
                            @else
                                <a href="{{ route('index.usuario') }}" class="btn btn-secondary">Volver</a>
                            @endif
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>

                    <!-- Botón eliminar cuenta -->
                    <hr class="my-4">
                    <div class="text-end">
                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal">
                            Eliminar cuenta
                        </button>
                    </div>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás segura?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    Esta acción eliminará tu cuenta de forma permanente. ¿Deseas continuar?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>

                                    <form action="{{ route('perfil.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Sí, eliminar cuenta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Script para toggle de contraseñas -->
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
</body>

</html>