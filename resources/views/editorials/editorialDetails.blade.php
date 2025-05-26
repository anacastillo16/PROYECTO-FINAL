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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modificarEditorialModal">
                                    Modificar editorial
                                </button>
                                <form action="{{ route('editorials.destroy', $editorial->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas borrar esta editorial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                                <a href="{{ route('editorials.index') }}" class="btn btn-secondary">Ver editoriales</a>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modificarEditorialModal" tabindex="-1"
                                aria-labelledby="modificarEditorialModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarEditorialModal">Modificar editorial
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST"
                                                action="{{ route('editorials.update', $editorial->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nombre</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ $editorial->name }}" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Dirección</label>
                                                    <input type="text" name="address" id="address" class="form-control"
                                                        value="{{ $editorial->address }}" />
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('editorials.show', $editorial->id) }}"
                                                        class="btn btn-outline-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar
                                                        cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>