<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Autores disponibles</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearAutorModal">
                Crear autor
            </button>
        </div>

        <!-- Modal Crear Autor -->
        <div class="modal fade" id="crearAutorModal" tabindex="-1" aria-labelledby="crearAutorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearAutorModalLabel">Crear nuevo autor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('autors.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Apellidos</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="editorial_id" class="form-label">Editorial</label>
                                <select name="editorial_id" id="editorial_id" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una editorial</option>
                                    @foreach($editoriales as $editorial)
                                        <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Crear autor</button>
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
                    <div class="card shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $autor->name }} {{ $autor->lastname }}</h5>
                            <a href="{{ route('autors.show', $autor->id) }}" class="btn btn-outline-primary">
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
