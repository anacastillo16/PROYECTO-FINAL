<nav class="navbar navbar-expand-lg navbar-light py-4" style="background-color: #6CBF84;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="{{ route('index.usuario') }}" style="color: white;">
            <img src="{{ asset('favicon.png') }}" alt="Biblioteca" width="40" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTrabajador" aria-controls="navbarTrabajador" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTrabajador">
            <ul class="navbar-nav me-auto mb-0 d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('usuario.autors.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('usuario.editorials.index') }}">Editoriales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('favoritos.index') }}">Favoritos</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-0 d-flex flex-row align-items-center gap-3">
                <li class="nav-item">
                    <a href="{{ route('perfil.edit') }}" class="navbar-text text-white fw-semibold">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn button-secondary btn-sm">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
