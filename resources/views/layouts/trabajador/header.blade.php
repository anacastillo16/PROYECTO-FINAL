<nav class="navbar navbar-expand-lg navbar-light bg-primary py-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-white fw-bold" href="{{ route('index.trabajador') }}">Biblioteca</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTrabajador" aria-controls="navbarTrabajador" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTrabajador">
            <ul class="navbar-nav me-auto mb-0 d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('autors.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('editorials.index') }}">Editoriales</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-0 d-flex flex-row align-items-center gap-3">
                <li class="nav-item">
                    <span class="navbar-text text-white fw-semibold">
                        {{ Auth::user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
