@extends('layouts.base')

@section('title', 'Detalle autor')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle del autor</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="background-color: #F7FAF5; border-color: #A8D689;">
                    <div class="row g-4 p-4">
                        <!-- Detalles autor -->
                        <div class="col-md-8 text-main">
                            <div class="card-body">
                                <h5 class="card-title fw-bold" style="color: #406343;">
                                    {{ $autor->name }} {{ $autor->lastname }}
                                </h5>
                                <p class="card-text"><strong>DNI:</strong> {{ $autor->dni }}</p>
                                <p class="card-text"><strong>Teléfono:</strong> {{ $autor->phone }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $autor->email }}</p>
                                <p class="card-text">
                                    <strong>Editorial:</strong>
                                    <a href="{{ route('usuario.editorials.show', $autor->editorial->id) }}" target="_blank" class="link-custom">
                                        {{ $autor->editorial->name }}
                                    </a>
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4">
                                <a href="{{ route('usuario.autors.index') }}" class="button-secondary-custom">
                                    Ver autores
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
