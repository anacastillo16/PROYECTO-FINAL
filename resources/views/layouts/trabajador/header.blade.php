<nav class="navbar navbar-expand-lg py-4" style="background-color: #6CBF84;">
    <div class="container-fluid">
        <a class="navbar-brand ms-2" href="{{ route('index.trabajador') }}" style="color: white;">
            <img src="{{ asset('favicon.ico') }}" alt="Biblioteca" width="60" height="60">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTrabajador" aria-controls="navbarTrabajador" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTrabajador">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-lg-row gap-3">
                <li class="nav-item">
                    <a class="nav-link button-primary-custom text-white" href="{{ route('trabajador.autors.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button-primary-custom text-white" href="{{ route('trabajador.editorials.index') }}">Editoriales</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex flex-lg-row align-items-lg-center gap-3">
                <li class="nav-item">
                    <a href="{{ route('perfil.edit') }}" class="navbar-text fw-semibold button-primary-custom text-white">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="button-primary-custom text-white">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
