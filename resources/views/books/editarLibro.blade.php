<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <h2 class="mb-4 text-center">Editar libro</h2>

                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $book->ISBN }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">URL de la portada</label>
                            <input type="text" name="image" id="image" class="form-control" value="{{ $book->image }}">
                        </div>

                        <div class="mb-3">
                            <label for="autor_id" class="form-label">Autor</label>
                            <select name="autor_id" id="autor_id" class="form-select" required>
                                @foreach($autores as $autor)
                                    <option value="{{ $autor->id }}" {{ $book->autor_id == $autor->id ? 'selected' : '' }}>
                                        {{ $autor->name }} {{ $autor->lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea name="description" id="description" rows="5" class="form-control" required>{{ $book->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
