<nav class="navbar navbar-expand-lg py-4" style="background-color: #6CBF84;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="{{ route('index.trabajador') }}" style="color: white;">
            <img src="{{ asset('favicon.ico') }}" alt="Biblioteca" width="40" height="40">
        </a>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTrabajador">
            <ul class="navbar-nav me-auto mb-0 d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link button-primary-custom" href="{{ route('trabajador.autors.index') }}" style="color: white;">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button-primary-custom" href="{{ route('trabajador.editorials.index') }}" style="color: white;">Editoriales</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-0 d-flex flex-row align-items-center gap-3">
                <li class="nav-item">
                    <a href="{{ route('perfil.edit') }}" class="navbar-text fw-semibold button-primary-custom" style="color: white;">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="button-primary-custom">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
