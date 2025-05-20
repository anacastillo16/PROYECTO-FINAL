<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle autor</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('layouts.trabajador.header')

    <main class="d-flex flex-column align-items-center justify-content-center text-center my-5">
        <h2 class="mb-4">Detalle del autor</h2>

        <div class="card shadow-sm w-100" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">{{ $autor->name }} {{ $autor->lastname }}</h5>
                <p class="card-text"><strong>DNI:</strong> {{ $autor->dni }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $autor->phone }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $autor->email }}</p>
                <p class="card-text">
                    <strong>Editorial:</strong>
                    <a href="{{ route('editorials.show', $autor->editorial->id) }}" class="link-primary" target="_blank">
                        {{ $autor->editorial->name }}
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-4 d-flex flex-column flex-md-row gap-2 justify-content-center">
            <a href="{{ route('autors.edit', $autor->id) }}" class="btn btn-warning">Modificar</a>

            <form action="{{ route('autors.destroy', $autor->id) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este autor?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
        </div>

        <div class="mt-3">
            <a href="{{ route('autors.index') }}" class="btn btn-secondary">Volver a lista de autores</a>
        </div>
    </main>
</body>
</html>
