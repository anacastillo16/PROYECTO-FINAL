<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar autor</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <h2 class="mb-4 text-center">Editar autor</h2>

                    <form method="POST" action="{{ route('autors.update', $autor->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control" value="{{ $autor->dni }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $autor->name }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $autor->lastname }}" />
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $autor->phone }}" />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $autor->email }}" />
                        </div>

                        <div class="mb-3">
                            <label for="editorial_id" class="form-label">Editorial</label>
                            <select name="editorial_id" id="editorial_id" class="form-select" required>
                                @foreach($editoriales as $editorial)
                                    <option value="{{ $editorial->id }}" {{ $editorial->id == $autor->editorial_id ? 'selected' : '' }}>
                                        {{ $editorial->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('autors.show', $autor->id) }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
</body>
</html>
