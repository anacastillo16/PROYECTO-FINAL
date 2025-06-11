import 'bootstrap';  // Solo JS de Bootstrap
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;


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
