<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalle editorial</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.usuario.header')

    <main class="container my-5">
        <h2 class="mb-4 text-center">Detalle de la editorial</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <div class="row g-4">
                        <!-- Detalles editorial -->
                        <div class="col-md-8">
                            <h2 class="card-title mb-3">{{ $editorial->name }}</h2>
                            <p class="card-text"><strong>Dirección:</strong> {{ $editorial->address}}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('usuario.editorials.index') }}" class="btn btn-secondary">Ver editoriales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>