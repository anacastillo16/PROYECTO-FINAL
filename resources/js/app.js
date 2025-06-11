import 'bootstrap';
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', () => {
    // Abrir modal si hay errores de validación 
    if (window.hasFormErrors) {
        const modalEl = document.getElementById(window.errorModalId);
        if (modalEl) {
            const modal = new bootstrap.Modal(modalEl);
            modal.show();
        }
    }

    // Mostrar/ocultar contraseña
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', () => {
            const inputId = button.getAttribute('data-target');
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });

    // Inicializar estrellas para puntuación
    function initStarRating(containerId, inputId, initialRating = 0) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const stars = container.querySelectorAll('.star');
        const input = document.getElementById(inputId);
        let currentRating = initialRating;

        input.value = currentRating;

        const paintStars = (rating) => {
            stars.forEach(star => {
                star.classList.toggle('selected', star.dataset.value <= rating);
            });
        };

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

    // Inicializar reseña nueva
    initStarRating('star-rating-new', 'rating-new');

    // Inicializar reseñas de edición
    document.querySelectorAll('[id^="star-rating-edit-"]').forEach(container => {
        const reviewId = container.id.replace('star-rating-edit-', '');
        const inputId = `rating-edit-${reviewId}`;
        const input = document.getElementById(inputId);
        const initialRating = input ? parseInt(input.value) : 0;

        initStarRating(container.id, inputId, initialRating);
    });
});
