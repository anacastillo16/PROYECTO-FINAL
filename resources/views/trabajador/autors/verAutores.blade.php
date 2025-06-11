@extends('layouts.base')

@section('title', 'Autores - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('trabajador.autors.index') }}" method="GET" class="d-flex">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control m-2" 
                    placeholder="Buscar por nombre..." 
                    value="{{ request('search') }}" 
                    style="border-color: #6CBF84;">
                <button type="submit" class="button-primary-custom m-2">Buscar</button>
                <a href="{{ route('trabajador.autors.index') }}" class="button-primary-custom m-2">Ver autores</a>
            </form>

            @if($noResults)
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
            <button class="button-primary-custom m-4" data-bs-toggle="modal" data-bs-target="#crearAutorModal">
                Crear autor
            </button>
        </div>

        <!-- Modal Crear Autor -->
        <div class="modal fade" id="crearAutorModal" tabindex="-1" aria-labelledby="crearAutorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #F7FAF5; border-radius: 8px;">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="crearAutorModalLabel">Crear nuevo autor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('trabajador.autors.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="dni" class="form-label text-main">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni') }}" required style="border-color: #6CBF84;">
                                @error('dni')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label text-main">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required style="border-color: #6CBF84;">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label text-main">Apellidos</label>
                                <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required style="border-color: #6CBF84;">
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label text-main">Teléfono</label>
                                <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required style="border-color: #6CBF84;">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-main">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required style="border-color: #6CBF84;">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="editorial_id" class="form-label text-main">Editorial</label>
                                <select name="editorial_id" id="editorial_id" class="form-select @error('editorial_id') is-invalid @enderror" required style="border-color: #6CBF84;">
                                    <option value="" disabled {{ old('editorial_id') ? '' : 'selected' }}>Selecciona una editorial</option>
                                    @foreach($editoriales as $editorial)
                                    <option value="{{ $editorial->id }}" {{ old('editorial_id') == $editorial->id ? 'selected' : '' }}>
                                        {{ $editorial->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('editorial_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="button" class="button-secondary-custom" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="button-primary-custom">Crear autor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                            <a href="{{ route('trabajador.autors.show', $autor->id) }}" class="button-secondary-custom">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@push('scripts')
    @if ($errors->any())
        <script>
            window.hasFormErrors = true;
            window.errorModalId = 'crearAutorModal';
        </script>
    @endif
@endpush
@endsection
