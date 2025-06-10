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
                <input type="text" name="search" class="form-control m-2" placeholder="Buscar por nombre..."
                    style="border-color: #6CBF84;" value="{{ request('search') }}"/>
                <button type="submit" class="button-primary-custom m-2">
                    Buscar
                </button>
                <a href="{{ route('usuario.autors.index') }}" class="button-primary-custom m-2">
                    Ver autores
                </a>
            </form>

            @if ($noResults)
                <div class="alert-warning-custom text-center m-2" role="alert" 
                     style="color:#4A4A4A; background-color:#F7FAF5; padding: 0.5rem; border-radius: 4px;">
                    No se encontró ningún autor con ese nombre.
                </div>
            @endif
        </div>
    </div>

    <main class="container body-bg rounded py-4">
        <div class="d-flex justify-content-center align-items-center m-4">
            <h2>Autores disponibles</h2>
        </div>
        <!-- Listado de autores centrado -->
        <div class="row justify-content-center">
            @foreach ($autors as $autor)
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm" style="background-color: #F7FAF5; border-color: #A8D689;">
                        <div class="card-body d-flex justify-content-between align-items-center text-main">
                            <h5 class="mb-0 fw-bold" style="color: #406343;">
                                {{ $autor->name }} {{ $autor->lastname }}
                            </h5>
                            <a href="{{ route('usuario.autors.show', $autor->id) }}" 
                               class="button-secondary-custom">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
