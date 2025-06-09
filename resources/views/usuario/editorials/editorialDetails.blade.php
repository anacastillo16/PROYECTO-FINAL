@extends('layouts.base')

@section('title', 'Detalle editorial')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5" style="background-color: #f8f9fa;">
        <h2 class="mb-4 text-center" style="color: #0d6efd;">Detalle de la editorial</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4" style="background-color: #ffffff; border-color: #dee2e6;">
                    <div class="row g-4">
                        <!-- Detalles editorial -->
                        <div class="col-md-8">
                            <h2 class="card-title mb-3" style="color: #0d6efd;">{{ $editorial->name }}</h2>
                            <p class="card-text" style="color: #212529;"><strong>Dirección:</strong> {{ $editorial->address }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('usuario.editorials.index') }}" class="btn btn-secondary" 
                                   style="background-color: #6c757d; border-color: #6c757d; color: #ffffff;">
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
