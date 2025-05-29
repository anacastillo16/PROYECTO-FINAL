<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle autor</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('layouts.usuario.header')

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
                                    <a href="{{ route('usuario.editorials.show', $autor->editorial->id) }}" class="link-primary" target="_blank">
                                        {{ $autor->editorial->name }}
                                    </a>
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('usuario.autors.index') }}" class="btn btn-secondary">Ver autores</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
