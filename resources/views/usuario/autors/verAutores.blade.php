@extends('layouts.base')

@section('title', 'Autores')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('usuario.autors.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre...">
                <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                <a href="{{ route('usuario.autors.index') }}" class="btn btn-primary ms-2">Ver autores</a>
            </form>
            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontró ningún autor con ese nombre.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <!-- Listado de autores centrado -->
        <div class="row justify-content-center">
            @foreach ($autors as $autor)
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $autor->name }} {{ $autor->lastname }}</h5>
                            <a href="{{ route('usuario.autors.show', $autor->id) }}" class="btn btn-outline-primary">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
