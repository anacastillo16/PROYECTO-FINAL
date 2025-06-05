@extends('layouts.base')

@section('title', 'Detalle autor')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <main class="container my-5">
        <h2 class="mb-4 text-center">Detalle del autor</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <div class="row g-4">
                        <!-- Detalles autor -->
                        <div class="col-md-8">
                           <div class="card-body">
                                <h5 class="card-title">{{ $autor->name }} {{ $autor->lastname }}</h5>
                                <p class="card-text"><strong>DNI:</strong> {{ $autor->dni }}</p>
                                <p class="card-text"><strong>Teléfono:</strong> {{ $autor->phone }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $autor->email }}</p>
                                <p class="card-text">
                                    <strong>Editorial:</strong>
                                    <a href="{{ route('trabajador.editorials.show', $autor->editorial->id) }}" class="link-primary" target="_blank">
                                        {{ $autor->editorial->name }}
                                    </a>
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('trabajador.autors.index') }}" class="btn btn-secondary">Ver autores</a>

                                <!-- Botón para abrir modal eliminar autor -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteAutorModal">
                                    Borrar autor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmación para borrar autor -->
        <div class="modal fade" id="confirmDeleteAutorModal" tabindex="-1" aria-labelledby="confirmDeleteAutorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteAutorModalLabel">¿Estás segura?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        Esta acción eliminará al autor de forma permanente. ¿Deseas continuar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                        <form action="{{ route('trabajador.autors.destroy', $autor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sí, eliminar autor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
