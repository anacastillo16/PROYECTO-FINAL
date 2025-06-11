<nav class="navbar navbar-expand-lg navbar-light py-4" style="background-color: #6CBF84;">
    <div class="container-fluid">
        <a class="navbar-brand ms-2" href="{{ route('index.usuario') }}" style="color: white;">
            <img src="{{ asset('favicon.ico') }}" alt="Biblioteca" width="60" height="60">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsuario" aria-controls="navbarUsuario" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarUsuario">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-lg-row gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white button-primary-custom" href="{{ route('usuario.autors.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white button-primary-custom" href="{{ route('usuario.editorials.index') }}">Editoriales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white button-primary-custom" href="{{ route('favoritos.index') }}">Favoritos</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex flex-lg-row align-items-lg-center gap-3">
                <li class="nav-item">
                    <a href="{{ route('perfil.edit') }}" class="navbar-text text-white fw-semibold button-primary-custom">
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
