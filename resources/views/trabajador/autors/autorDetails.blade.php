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
                                    <a href="{{ route('editorials.show', $autor->editorial->id) }}" class="link-primary" target="_blank">
                                        {{ $autor->editorial->name }}
                                    </a>
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modificarAutorModal">
                                    Modificar autor
                                </button>
                                <form action="{{ route('autors.destroy', $autor->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas borrar este autor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                                <a href="{{ route('autors.index') }}" class="btn btn-secondary">Ver autores</a>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modificarAutorModal" tabindex="-1"
                                aria-labelledby="modificarAutorModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarAutorModal">Modificar autor
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('autors.update', $autor->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="dni" class="form-label">DNI</label>
                                                    <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ $autor->dni }}" required>
                                                    @error('dni')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nombre</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $autor->name }}"  required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="lastname" class="form-label">Apellidos</label>
                                                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $autor->lastname }}" required > 
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Teléfono</label>
                                                    <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $autor->phone }}" required>
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $autor->email }}" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <label for="editorial_id" class="form-label">Editorial</label>
                                                    <select name="editorial_id" id="editorial_id" class="form-select" required>
                                                        @foreach($editoriales as $editorial)
                                                            <option value="{{ $editorial->id }}" {{ $autor->editorial_id == $editorial->id ? 'selected' : '' }}>
                                                                {{ $editorial->name }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Modificar autor</button>
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

    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('modificarAutorModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    </script>
    @endif
</body>
</html>
