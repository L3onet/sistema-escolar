<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- O si usas CDN para desarrollo -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <a href="/" class="text-xl font-bold text-white hover:text-gray-300 transition">
                    Sistema Académico
                </a>

                <!-- Botón hamburguesa (móvil) -->
                <button
                    id="mobile-menu-button"
                    class="lg:hidden inline-flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Menú desktop -->
                <div class="hidden lg:flex lg:items-center lg:space-x-1">

                    <!-- Cursos y Grupos -->
                    <div class="relative dropdown">
                        <button class="dropdown-toggle px-3 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-800 rounded transition">
                            Cursos y Grupos
                            <svg class="inline w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mostrar</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Agregar</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Menú móvil -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4">
                <div class="flex flex-col space-y-1">

                    <!-- Cursos y Grupos (móvil) -->
                    <div class="mobile-dropdown">
                        <button class="mobile-dropdown-toggle w-full text-left px-3 py-2 text-gray-300 hover:bg-gray-800 rounded flex justify-between items-center">
                            <span>Cursos y Grupos</span>
                            <svg class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="mobile-dropdown-menu hidden pl-6 mt-1 space-y-1">
                            <a href="#" class="block px-3 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-800 rounded">Mostrar</a>
                            <a href="#" class="block px-3 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-800 rounded">Agregar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-900 text-white py-4 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm text-gray-400">
                &copy; 202 Sistema Académico. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <!-- JavaScript para menús desplegables -->
    <script>
        // Toggle menú móvil principal
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Dropdowns en desktop (hover)
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');

            dropdown.addEventListener('mouseenter', () => {
                menu.classList.remove('hidden');
            });

            dropdown.addEventListener('mouseleave', () => {
                menu.classList.add('hidden');
            });
        });

        // Dropdowns en móvil (click)
        document.querySelectorAll('.mobile-dropdown').forEach(dropdown => {
            const toggle = dropdown.querySelector('.mobile-dropdown-toggle');
            const menu = dropdown.querySelector('.mobile-dropdown-menu');
            const icon = toggle.querySelector('svg');

            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
</body>
</html>
