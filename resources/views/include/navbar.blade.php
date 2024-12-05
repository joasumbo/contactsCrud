<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Gerenciar Contatos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                    <li class="list-unstyled">
                        <a href="{{ route('lixeira.contacto') }}" class="nav-item text-white mx-4">
                            <i class="fas fa-trash"></i>
                            <span class="mx-2">Lixeira</span>
                        </a>
                    </li>
                    @endif
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            @if (Auth::check())
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <span class="mx-2">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Terminar Sessão
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            @else
                            <!-- Usuário não logado -->
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-user"></i> <span class="mx-2">Iniciar Sessão</span>
                            </a>
                            @endif
                        </li>

                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>