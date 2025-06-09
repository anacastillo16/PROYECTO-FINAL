@extends('layouts.base')

@section('title', 'Detalle autor')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5" style="background-color: #f8f9fa;">
        <h2 class="mb-4 text-center" style="color: #0d6efd;">Detalle del autor</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4" style="background-color: #ffffff; border-color: #dee2e6;">
                    <div class="row g-4">
                        <!-- Detalles autor -->
                        <div class="col-md-8">
                           <div class="card-body" style="color: #212529;">
                                <h5 class="card-title" style="color: #0d6efd;">{{ $autor->name }} {{ $autor->lastname }}</h5>
                                <p class="card-text"><strong>DNI:</strong> {{ $autor->dni }}</p>
                                <p class="card-text"><strong>Teléfono:</strong> {{ $autor->phone }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $autor->email }}</p>
                                <p class="card-text">
                                    <strong>Editorial:</strong>
                                    <a href="{{ route('usuario.editorials.show', $autor->editorial->id) }}" class="link-primary" target="_blank" style="color: #0d6efd;">
                                        {{ $autor->editorial->name }}
                                    </a>
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('usuario.autors.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d; color: white;">Ver autores</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
