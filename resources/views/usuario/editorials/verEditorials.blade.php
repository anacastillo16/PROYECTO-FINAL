@extends('layouts.base')

@section('title', 'Editoriales')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('usuario.editorials.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ms-2" style="background-color: #4C956C; border-color: #4C956C;">
                    Buscar
                </button>
                <a href="{{ route('usuario.editorials.index') }}" class="btn btn-primary ms-2"
                    style="background-color: #4C956C; border-color: #4C956C;">
                    Ver editoriales
                </a>
            </form>
            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert"
                    style="background-color: #E6F2E6; color: #2E5D2E; border-color: #C3D9C3;">
                    No se encontró ninguna editorial con ese nombre.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: #406343;">Editoriales disponibles</h2>
        </div>

        <!-- Listado de editoriales  -->
        <div class="row justify-content-center">
            @foreach ($editorials as $editorial)
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm" style="border: 1px solid #4C956C; border-radius: 0.5rem;">
                        <div class="card-body d-flex justify-content-between align-items-center" style="background-color: #F7FAF5;">
                            <h5 class="mb-0" style="color: #406343;">{{ $editorial->name }}</h5>
                            <a href="{{ route('usuario.editorials.show', $editorial->id) }}"
                                class="btn btn-outline-primary"
                                style="color: #4C956C; border-color: #4C956C;">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
@endsection
