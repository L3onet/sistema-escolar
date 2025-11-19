<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar Toggle (Mobile) -->
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <!-- Logo -->
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <span class="logo-text">SII - ITCA</span>
            </div>

            <!-- Navigation -->
            <div class="nav-section-title">Dashboard</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="/" class="nav-link-custom {{ request()->is('/') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="nav-section-title">Gestión Académica</div>
            <ul class="nav-menu">
                <!-- Alumnos -->
                <li class="nav-item {{ request()->routeIs('alumnos.*') ? 'active' : '' }}">
                    <a href="{{ route('alumnos.index') }}" class="nav-link-custom {{ request()->routeIs('alumnos.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Alumnos</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('alumnos.index') }}" class="nav-link-custom"><i class="bi bi-list-ul"></i> Mostrar</a></li>
                        <li><a href="{{ route('alumnos.create') }}" class="nav-link-custom"><i class="bi bi-plus-circle"></i> Agregar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('alumnos.index', ['estatus_alumno' => 'ACT']) }}" class="nav-link-custom"><i class="bi bi-check-circle text-success"></i> Ver Activos</a></li>
                        <li><a href="{{ route('alumnos.index', ['estatus_alumno' => 'INA']) }}" class="nav-link-custom"><i class="bi bi-x-circle text-secondary"></i> Ver Inactivos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('alumnos.export') }}" class="nav-link-custom"><i class="bi bi-file-earmark-excel text-success"></i> Exportar</a></li>
                    </ul>
                </li>

                <!-- Períodos Escolares -->
                <li class="nav-item {{ request()->routeIs('periodos-escolares.*') ? 'active' : '' }}">
                    <a href="{{ route('periodos-escolares.index') }}" class="nav-link-custom {{ request()->routeIs('periodos-escolares.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-range"></i>
                        <span>Períodos Escolares</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('periodos-escolares.index') }}" class="nav-link-custom"><i class="bi bi-list-ul"></i> Mostrar</a></li>
                        <li><a href="{{ route('periodos-escolares.create') }}" class="nav-link-custom"><i class="bi bi-plus-circle"></i> Agregar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('periodos-escolares.index', ['status' => 'A']) }}" class="nav-link-custom"><i class="bi bi-check-circle text-success"></i> Ver Activos</a></li>
                        <li><a href="{{ route('periodos-escolares.index', ['status' => 'I']) }}" class="nav-link-custom"><i class="bi bi-x-circle text-secondary"></i> Ver Inactivos</a></li>
                    </ul>
                </li>

                <!-- Aseguradoras -->
                <li class="nav-item {{ request()->routeIs('aseguradoras.*') ? 'active' : '' }}">
                    <a href="{{ route('aseguradoras.index') }}" class="nav-link-custom {{ request()->routeIs('aseguradoras.*') ? 'active' : '' }}">
                        <i class="bi bi-shield-check"></i>
                        <span>Aseguradoras</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('aseguradoras.index') }}" class="nav-link-custom"><i class="bi bi-list-ul"></i> Mostrar</a></li>
                        <li><a href="{{ route('aseguradoras.create') }}" class="nav-link-custom"><i class="bi bi-plus-circle"></i> Agregar</a></li>
                    </ul>
                </li>

                <!-- Unidades Temáticas -->
                <li class="nav-item {{ request()->routeIs('unidades_tematicas.*') ? 'active' : '' }}">
                    <a href="{{ route('unidades_tematicas.index') }}" class="nav-link-custom {{ request()->routeIs('unidades_tematicas.*') ? 'active' : '' }}">
                        <i class="bi bi-book"></i>
                        <span>Unidades Temáticas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('unidades_tematicas.index') }}" class="nav-link-custom"><i class="bi bi-list-ul"></i> Mostrar</a></li>
                        <li><a href="{{ route('unidades_tematicas.create') }}" class="nav-link-custom"><i class="bi bi-plus-circle"></i> Agregar</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav-section-title">Usuario</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        <i class="bi bi-gear"></i>
                        <span>Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar...">
                    <span class="search-shortcut">⌘/</span>
                </div>

                <div class="top-actions">
                    <button class="action-button">
                        <i class="bi bi-person"></i>
                    </button>
                    <button class="action-button">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <button class="action-button">
                        <i class="bi bi-moon"></i>
                    </button>
                    <button class="action-button">
                        <i class="bi bi-chat-dots"></i>
                    </button>
                    <button class="action-button">
                        <i class="bi bi-question-circle"></i>
                    </button>
                </div>
            </div>

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
