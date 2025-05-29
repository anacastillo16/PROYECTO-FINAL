<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editoriales</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.usuario.header')

    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('usuario.editorials.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre...">
                <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                <a href="{{ route('usuario.editorials.index') }}" class="btn btn-primary ms-2">Ver editoriales</a>
            </form>
            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontró ninguna editorial con ese nombre.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Editoriales disponibles</h2>
        </div>

        <!-- Listado de editoriales  -->
        <div class="row justify-content-center">
            @foreach ($editorials as $editorial)
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $editorial->name }}</h5>
                            <a href="{{ route('usuario.editorials.show', $editorial->id) }}" class="btn btn-outline-primary">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</body>

</html>