@extends('layouts.base')

@section('title', 'Detalle editorial')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle de la editorial</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="background-color: #F7FAF5; border-color: #A8D689;">
                    <div class="row g-4 p-4">
                        <!-- Detalles editorial -->
                        <div class="col-md-8 text-main">
                            <div class="card-body">
                                <h5 class="card-title fw-bold" style="color: #406343;">
                                    {{ $editorial->name }}
                                </h5>
                                <p class="card-text"><strong>Dirección:</strong> {{ $editorial->address }}</p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4">
                                <a href="{{ route('usuario.editorials.index') }}" class="button-secondary-custom">
                                    Ver editoriales
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection