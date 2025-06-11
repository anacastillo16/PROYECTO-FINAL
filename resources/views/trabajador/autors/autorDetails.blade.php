@extends('layouts.base')

@section('title', 'Detalle Autor - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh; max-width: 720px;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle del autor</h2>

        <div class="card shadow" style="background-color: #F7FAF5;">
            <div class="card-body text-main px-4 py-5">
                <h3 class="mb-3 fw-bold" style="color: #406343;">{{ $autor->name }} {{ $autor->lastname }}</h3>

                <p><strong>DNI:</strong> {{ $autor->dni }}</p>
                <p><strong>Teléfono:</strong> {{ $autor->phone }}</p>
                <p><strong>Email:</strong> {{ $autor->email }}</p>
                <p>
                    <strong>Editorial:</strong>
                    <a href="{{ route('trabajador.editorials.show', $autor->editorial->id) }}" target="_blank" class="link-custom">
                        {{ $autor->editorial->name }}
                    </a>
                </p>

                <!-- Botones -->
                <div class="mt-4 d-flex flex-wrap gap-2 align-items-stretch justify-content-start">
                    <a href="{{ route('trabajador.autors.index') }}" class="button-primary-custom">Ver autores</a>

                    <button type="button" class="button-primary-custom" data-bs-toggle="modal" data-bs-target="#modificarAutorModal">
                        Modificar autor
                    </button>

                    <button type="button" class="button-primary-custom" style="background-color: #E26A6A; color: white;" data-bs-toggle="modal" data-bs-target="#confirmDeleteAutorModal">
                        Borrar autor
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal para modificar autor -->
        <div class="modal fade" id="modificarAutorModal" tabindex="-1" aria-labelledby="modificarAutorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="background-color: #F7FAF5;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="modificarAutorModalLabel">Modificar autor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('trabajador.autors.update', $autor->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label text-main">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $autor->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label text-main">Apellidos</label>
                                <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror"
                                    value="{{ old('lastname', $autor->lastname) }}" required>
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dni" class="form-label text-main">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror"
                                    value="{{ old('dni', $autor->dni) }}" required>
                                @error('dni')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label text-main">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $autor->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-main">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $autor->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="editorial_id" class="form-label text-main">Editorial</label>
                                <select name="editorial_id" id="editorial_id" class="form-select" required>
                                    @foreach($editoriales as $editorial)
                                        <option value="{{ $editorial->id }}" {{ old('editorial_id', $autor->editorial_id) == $editorial->id ? 'selected' : '' }}>
                                            {{ $editorial->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('trabajador.autors.show', $autor->id) }}" class="button-secondary-custom">Cancelar</a>
                                <button type="submit" class="button-primary-custom">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmación para borrar autor -->
        <div class="modal fade" id="confirmDeleteAutorModal" tabindex="-1" aria-labelledby="confirmDeleteAutorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #F7FAF5;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="confirmDeleteAutorModalLabel">¿Estás segura?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-main">
                        Esta acción eliminará al autor de forma permanente. ¿Deseas continuar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button-primary-custom" data-bs-dismiss="modal">Cancelar</button>

                        <form action="{{ route('trabajador.autors.destroy', $autor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-primary-custom" style="background-color: #E26A6A;">Sí, eliminar autor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    @if ($errors->any())
        <script>
            window.hasFormErrors = true;
            window.errorModalId = 'modificarAutorModal';
        </script>
    @endif
@endpush
