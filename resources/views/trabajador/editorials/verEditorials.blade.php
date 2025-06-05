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
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                <a href="{{ route('trabajador.editorials.index') }}" class="btn btn-primary ms-2">Ver editoriales</a>
            </form>
            @if (!empty($noResults) && $noResults)
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontró ninguna editorial con ese nombre.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Editoriales disponibles</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearEditorialModal">
                Crear editorial
            </button>
        </div>

        <!-- Modal Crear Editorial -->
        <div class="modal fade" id="crearEditorialModal" tabindex="-1" aria-labelledby="crearEditorialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearEditorialModalLabel">Crear nueva editorial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('trabajador.editorials.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Crear editorial</button>
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
                    <div class="card shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $editorial->name }}</h5>
                            <a href="{{ route('trabajador.editorials.show', $editorial->id) }}" class="btn btn-outline-primary">
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
