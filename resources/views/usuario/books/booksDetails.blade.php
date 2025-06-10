@extends('layouts.base')

@section('title', 'Detalle Libro')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle del libro</h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow" style="background-color: #F7FAF5;">
                    <div class="row g-4 p-4">
                        <!-- Imagen del libro -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $book->image }}" alt="Portada del libro" class="img-fluid rounded"
                                style="height: 400px; object-fit: cover;">
                        </div>

                        <!-- Detalles del libro -->
                        <div class="col-md-8 text-main">
                            <h3 class="mb-3 fw-bold" style="color: #406343;">{{ $book->title }}</h3>
                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                            <p>
                                <strong>Autor:</strong>
                                <a href="{{ route('usuario.autors.show', $book->autor->id) }}" target="_blank" class="link-custom">
                                    {{ $book->autor->name }} {{ $book->autor->lastname }}
                                </a>
                            </p>

                            <p class="fw-bold">Descripción:</p>
                            <p>{{ $book->description }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2 align-items-start">
                                <a href="{{ route('index.usuario') }}" class="button-secondary-custom">Ver libros</a>

                                @auth
                                    @if(auth()->user()->favoriteBooks->contains($book->id))
                                        <form action="{{ route('favoritos.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-secondary-custom">★ Quitar de favoritos</button>
                                        </form>
                                    @else
                                        <form action="{{ route('favoritos.store', $book) }}" method="POST">
                                            @csrf
                                            <button class="button-secondary-custom">☆ Añadir a favoritos</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reseñas --}}
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h4 class="text-main fw-bold mb-3">Reseñas</h4>

                @if($book->reviews->isEmpty())
                    <p class="text-muted">Este libro aún no tiene reseñas.</p>
                @else
                    @foreach($book->reviews as $review)
                        <div class="card mb-3 shadow-sm" style="background-color: #ffffff;">
                            <div class="card-body">
                                <p class="mb-1"><strong style="color: #000;">{{ $review->user->name }}</strong></p>
                                <p class="mb-1 star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $review->rating ? 'selected' : '' }}">&#9733;</span>
                                    @endfor
                                </p>

                              <p>{{ $review->comment }}</p>
                                <p class="text-muted mt-2" style="font-size: 0.9rem;">
                                    {{ $review->created_at != $review->updated_at 
                                        ? 'Editado el ' . $review->updated_at->setTimezone('Europe/Madrid')->format('d/m/Y H:i') 
                                        : 'Publicado el ' . $review->created_at->setTimezone('Europe/Madrid')->format('d/m/Y H:i') 
                                    }}
                                </p>
 

                                @auth
                                    @if(auth()->id() === $review->user_id)
                                        <div class="mt-2 d-flex gap-2">
                                            <!-- Botón editar -->
                                            <button class="button-primary-custom"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editReviewModal{{ $review->id }}">
                                                Editar
                                            </button>

                                            <!-- Botón eliminar -->
                                            <button type="button" class="button-primary-custom" style="background-color: #E26A6A; color: white;" data-bs-toggle="modal" data-bs-target="#deleteReviewModal{{ $review->id }}">
                                                Borrar
                                            </button>

                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        <!-- Modal editar reseña -->
                        <div class="modal fade" id="editReviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content"style="background-color: #F7FAF5;">
                                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title text-main">Editar reseña</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Puntuación:</label>
                                                <div class="star-rating" id="star-rating-edit-{{ $review->id }}">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="star" data-value="{{ $i }}">&#9733;</span>
                                                    @endfor
                                                </div>
                                                <input type="hidden" name="rating" id="rating-edit-{{ $review->id }}" value="{{ $review->rating }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="comment{{ $review->id }}" class="form-label">Comentario:</label>
                                                <textarea name="comment" id="comment{{ $review->id }}" class="form-control" required>{{ $review->comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="button-primary-custom">Guardar cambios</button>
                                            <button type="button" class="button-secondary-custom" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal eliminar reseña -->
                        <div class="modal fade" id="deleteReviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background-color: #F7FAF5;">
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title text-main">Confirmar eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás segura de que deseas eliminar esta reseña?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="button-secondary-custom" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="button-primary-custom" style="background-color: #E26A6A;">Eliminar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Publicar reseña --}}
        @auth
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold text-main">Publicar nueva reseña</h5>
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                {{-- Estrellas interactivas --}}
                                <div class="mb-3">
                                    <label class="form-label">Puntuación:</label>
                                    <div class="star-rating" id="star-rating-new">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="star" data-value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="rating-new" required>
                                </div>

                                <div class="mb-3">
                                    <textarea name="comment" class="form-control" placeholder="Escribe tu reseña..." required></textarea>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="button-primary-custom">Publicar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

    </main>

    {{-- Script para estrellas interactiva --}}
    @push('scripts')
    <script>
        // Función para inicializar rating en un conjunto de estrellas y input asociado
        function initStarRating(containerId, inputId, initialRating = 0) {
            const container = document.getElementById(containerId);
            if (!container) return;

            const stars = container.querySelectorAll('.star');
            const input = document.getElementById(inputId);

            let currentRating = initialRating;
            input.value = currentRating;

            // Pinta estrellas según rating
            function paintStars(rating) {
                stars.forEach(star => {
                    star.classList.toggle('selected', star.dataset.value <= rating);
                });
            }

            paintStars(currentRating);

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    currentRating = star.dataset.value;
                    input.value = currentRating;
                    paintStars(currentRating);
                });

                star.addEventListener('mouseover', () => {
                    paintStars(star.dataset.value);
                });

                star.addEventListener('mouseout', () => {
                    paintStars(currentRating);
                });
            });
        }

        // Inicializar estrellas para nueva reseña
        initStarRating('star-rating-new', 'rating-new');

        // Inicializar estrellas para cada modal de edición con rating existente
        @foreach($book->reviews as $review)
            initStarRating('star-rating-edit-{{ $review->id }}', 'rating-edit-{{ $review->id }}', {{ $review->rating }});
        @endforeach
    </script>
    @endpush
@endsection