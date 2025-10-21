<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill"></i> Sistema Académico
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Períodos Escolares -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('periodos-escolares.*') ? 'active' : '' }}" 
                           href="#" 
                           id="navPeriodos" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            <i class="bi bi-calendar-range"></i> Períodos Escolares
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navPeriodos">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('periodos-escolares.index') ? 'active' : '' }}" 
                                   href="{{ route('periodos-escolares.index') }}">
                                    <i class="bi bi-list-ul"></i> Mostrar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('periodos-escolares.create') ? 'active' : '' }}" 
                                   href="{{ route('periodos-escolares.create') }}">
                                    <i class="bi bi-plus-circle"></i> Agregar
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('periodos-escolares.index', ['status' => 'A']) }}">
                                    <i class="bi bi-check-circle text-success"></i> Ver Activos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('periodos-escolares.index', ['status' => 'I']) }}">
                                    <i class="bi bi-x-circle text-secondary"></i> Ver Inactivos
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Aseguradoras -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('aseguradoras.*') ? 'active' : '' }}" 
                           href="#" 
                           id="navAseguradoras" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            <i class="bi bi-shield-check"></i> Aseguradoras
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navAseguradoras">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('aseguradoras.index') ? 'active' : '' }}" 
                                   href="{{ route('aseguradoras.index') }}">
                                    <i class="bi bi-list-ul"></i> Mostrar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('aseguradoras.create') ? 'active' : '' }}" 
                                   href="{{ route('aseguradoras.create') }}">
                                    <i class="bi bi-plus-circle"></i> Agregar
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Unidades Temáticas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('unidades_tematicas.*') ? 'active' : '' }}" 
                           href="#" 
                           id="navUnidades" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            <i class="bi bi-book"></i> Unidades Temáticas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navUnidades">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('unidades_tematicas.index') ? 'active' : '' }}" 
                                   href="{{ route('unidades_tematicas.index') }}">
                                    <i class="bi bi-list-ul"></i> Mostrar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('unidades_tematicas.create') ? 'active' : '' }}" 
                                   href="{{ route('unidades_tematicas.create') }}">
                                    <i class="bi bi-plus-circle"></i> Agregar
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Usuario (opcional - a la derecha) -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Usuario
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navUser">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container-fluid py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            <p class="mb-0">
                <i class="bi bi-c-circle"></i> 2025 Sistema Académico. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Confirmación de eliminación con SweetAlert2
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Mostrar mensajes de éxito/error con SweetAlert2
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif
    </script>

    @stack('scripts')
</body>
</html>