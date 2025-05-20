<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalle editorial</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5 d-flex justify-content-center">
        <div class="card shadow" style="max-width: 600px; width: 100%;">
            <div class="card-body text-center">
                <h2 class="card-title mb-4">{{ $editorial->name }}</h2>
                <p class="card-text"><strong>Dirección:</strong> {{ $editorial->address ?? 'No disponible' }}</p>

                <div class="mt-4 d-flex justify-content-center gap-2">
                    <a href="{{ route('editorials.edit', $editorial->id) }}" class="btn btn-warning">Modificar</a>

                    <form action="{{ route('editorials.destroy', $editorial->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta editorial?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
                
                <div class="mt-3">
                    <a href="{{ route('editorials.index') }}" class="btn btn-secondary">Volver a lista de editoriales</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
