@extends('layouts.base')

@section('title', 'Detalle editorial - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh; max-width: 720px;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle de la editorial</h2>

        <div class="card shadow" style="background-color: #F7FAF5;">
            <div class="card-body text-main px-4 py-5">
                <h3 class="mb-3 fw-bold" style="color: #406343;">{{ $editorial->name }}</h3>

                <p><strong>Dirección:</strong> {{ $editorial->address }}</p>

                <!-- Botones -->
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('trabajador.editorials.index') }}" class="button-primary-custom">
                        Ver editoriales
                    </a>

                    <button type="button" class="button-primary-custom" data-bs-toggle="modal" data-bs-target="#modificarEditorialModal">
                        Modificar editorial
                    </button>

                    <button type="button" class="button-primary-custom" style="background-color: #E26A6A; color: white;" data-bs-toggle="modal" data-bs-target="#confirmDeleteEditorialModal">
                        Borrar editorial
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal modificar editorial -->
        <div class="modal fade" id="modificarEditorialModal" tabindex="-1" aria-labelledby="modificarEditorialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="background-color: #F7FAF5;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="modificarEditorialModalLabel">Modificar editorial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('trabajador.editorials.update', $editorial->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label text-main">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $editorial->name) }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label text-main">Dirección</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $editorial->address) }}" />
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('trabajador.editorials.show', $editorial->id) }}" class="button-secondary-custom">
                                    Cancelar
                                </a>
                                <button type="submit" class="button-primary-custom">
                                    Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal confirmación borrar editorial -->
        <div class="modal fade" id="confirmDeleteEditorialModal" tabindex="-1" aria-labelledby="confirmDeleteEditorialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #F7FAF5;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="confirmDeleteEditorialModalLabel">¿Estás segura?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-main">
                        Esta acción eliminará la editorial de forma permanente. ¿Deseas continuar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button-primary-custom" data-bs-dismiss="modal">Cancelar </button>

                        <form action="{{ route('trabajador.editorials.destroy', $editorial->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-primary-custom" style="background-color: #E26A6A;">
                                Sí, eliminar editorial
                            </button>
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
            document.addEventListener('DOMContentLoaded', function () {
                var modalEl = document.getElementById('modificarEditorialModal');
                if (modalEl) {
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
            });
        </script>
    @endif
@endpush
