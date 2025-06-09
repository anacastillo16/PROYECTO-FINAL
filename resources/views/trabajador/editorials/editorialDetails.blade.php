@extends('layouts.base')

@section('title', 'Detalle editorial - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <div class="body-bg min-vh-100 py-5">
        <main class="container my-5">
            <h2 class="mb-4 text-center text-main">Detalle de la editorial</h2>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-4">
                        <div class="row g-4">
                            <!-- Detalles editorial -->
                            <div class="col-md-8">
                                <h2 class="card-title mb-3 text-main">{{ $editorial->name }}</h2>
                                <p class="card-text text-main"><strong>Dirección:</strong> {{ $editorial->address }}</p>

                                <!-- Botones -->
                                <div class="mt-4 d-flex gap-2">
                                    <button type="button" class="button-primary-custom" data-bs-toggle="modal"
                                        data-bs-target="#modificarEditorialModal">
                                        Modificar editorial
                                    </button>

                                    <!-- Botón para abrir modal borrar -->
                                    <button type="button" class="button-secondary-custom" style="background-color: #d9534f; color: white;"
                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteEditorialModal">
                                        Borrar
                                    </button>

                                    <a href="{{ route('trabajador.editorials.index') }}" class="button-secondary-custom text-decoration-none d-flex align-items-center justify-content-center">
                                        Ver editoriales
                                    </a>
                                </div>

                                <!-- Modal modificar editorial -->
                                <div class="modal fade" id="modificarEditorialModal" tabindex="-1"
                                    aria-labelledby="modificarEditorialModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modificarEditorialModalLabel">Modificar editorial</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                    aria-label="Cerrar"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('trabajador.editorials.update', $editorial->id) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-3">
                                                        <label for="name" class="form-label text-main">Nombre</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name', $editorial->name) }}" required />
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address" class="form-label text-main">Dirección</label>
                                                        <input type="text" name="address" id="address" class="form-control"
                                                            value="{{ old('address', $editorial->address) }}" />
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <a href="{{ route('trabajador.editorials.show', $editorial->id) }}"
                                                            class="button-secondary-custom text-decoration-none d-flex align-items-center justify-content-center">
                                                            Cancelar
                                                        </a>
                                                        <button type="submit" class="button-primary-custom">Guardar cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal confirmación borrar editorial -->
                                <div class="modal fade" id="confirmDeleteEditorialModal" tabindex="-1" aria-labelledby="confirmDeleteEditorialModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="confirmDeleteEditorialModalLabel">¿Estás segura?</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body text-main">
                                                Esta acción eliminará la editorial de forma permanente. ¿Deseas continuar?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="button-secondary-custom" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('trabajador.editorials.destroy', $editorial->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-secondary-custom" style="background-color:#d9534f; color:white;">
                                                        Sí, eliminar editorial
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('modificarEditorialModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    </script>
    @endif
@endpush
