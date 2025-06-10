@extends('layouts.base')

@section('title', 'Editoriales - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('trabajador.editorials.index') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    name="search"
                    class="form-control m-2"
                    placeholder="Buscar por nombre..."
                    value="{{ request('search') }}" 
                    style="border-color: #6CBF84;">
                    <button type="submit" class="button-primary-custom m-2">Buscar</button>
                    <a href="{{ route('trabajador.editorials.index') }}" class="button-primary-custom m-2">
                        Ver editoriales
                    </a>
                </form>

                @if ($noResults) 
                    <div class="alert-warning-custom text-center m-2" role="alert" 
                        style="color:#4A4A4A; background-color:#F7FAF5; padding: 0.5rem; border-radius: 4px;">
                        No se encontró ninguna editorial con ese nombre.
                    </div>
                @endif
        </div>
    </div>

    <main class="container body-bg rounded py-4">
        <div class="d-flex justify-content-center align-items-center m-4">
            <h2>Editoriales disponibles</h2>
            <button class="button-primary-custom m-4" data-bs-toggle="modal" data-bs-target="#crearEditorialModal">
                Crear editorial
            </button>
        </div>

        <!-- Modal Crear Editorial -->
        <div class="modal fade" id="crearEditorialModal" tabindex="-1" aria-labelledby="crearEditorialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #F7FAF5; border-radius: 8px;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="crearEditorialModalLabel">Crear nueva editorial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('trabajador.editorials.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label text-main">Nombre</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    required
                                    style="border-color: #6CBF84;"
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label text-main">Dirección</label>
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="form-control"
                                    value="{{ old('address') }}"
                                    required
                                    style="border-color: #6CBF84;"
                                >
                            </div>

                            <div class="text-end">
                                <button type="button" class="button-secondary-custom" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="button-primary-custom">Crear editorial</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de editoriales centrado -->
        <div class="row justify-content-center">
            @foreach ($editorials as $editorial)
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm" style="background-color: #F7FAF5; border-color: #A8D689;">
                        <div class="card-body d-flex justify-content-between align-items-center text-main">
                            <h5 class="mb-0 fw-bold" style="color: #406343;">{{ $editorial->name }}</h5>
                            <a href="{{ route('trabajador.editorials.show', $editorial->id) }}" class="button-secondary-custom">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@push('scripts')
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('crearEditorialModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    </script>
    @endif
@endpush
