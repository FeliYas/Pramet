@props(['logos', 'redes'])
<nav class="w-full fixed z-50" x-data="navbarData" x-init="initNavbar()">

    <!-- Versión móvil -->
    <div class="bg-white  lg:hidden">
        <div class="flex justify-between items-center h-[90px] w-[90%] max-w-[1224px] mx-auto">
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset(Route::currentRouteName() == 'home' ? $logos[0]->path : $logos[1]->path) }}"
                        alt="logo" class="w-46 h-16">
                </a>
            </div>
            <div class="mt-1.5">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="focus:outline-none">
                    <i class="fa-solid fa-bars text-xl text-black"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú móvil desplegable -->
    <div class="lg:hidden bg-white shadow-lg overflow-hidden transition-all duration-300 absolute w-full z-40"
        :class="mobileMenuOpen ? 'max-h-screen' : 'max-h-0'" x-cloak>
        <div class="flex flex-col px-4 py-2 text-black text-xl divide-y divide-[#DCDCDC]">
            <a href="{{ route('nosotros') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">NOSOTROS</a>
            <a href="{{ route('categorias') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">PRODUCTOS</a>
            <a href="{{ route('servicios') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">SERVICIOS</a>
            <a href="{{ route('clientes') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">CLIENTES</a>
            <a href="{{ route('novedades') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">NOVEDADES</a>
            <a href="{{ route('contacto') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">CONTACTO</a>
            <a href="{{ route('presupuesto') }}" class="py-2 hover:text-white transition-colors duration-300"
                @click="mobileMenuOpen = false">PRESUPUESTO</a>
        </div>
    </div>

    <!-- Versión desktop -->
    <div class="hidden lg:block w-full h-[90px] transition-all duration-300"
        :class="shouldShowScrolledStyle ? 'bg-white shadow-lg' : 'bg-transparent'">
        <div class="w-[90%] max-w-[1224px] mx-auto flex justify-between items-center h-full transition-colors duration-300"
            :class="shouldShowScrolledStyle ? 'text-black' : 'text-white'">

            <!-- Logo -->
            <a href="{{ route('home') }}">
                <div class="relative py-4 group transition-all duration-300">
                    <img :src="shouldShowScrolledStyle ? '{{ asset($logos[1]->path) }}' : '{{ asset($logos[2]->path) }}'"
                        alt="logo">
                </div>
            </a>

            <!-- Links -->
            <div class="flex items-center gap-3">
                <a href="{{ route('nosotros') }}"
                    class="{{ Route::currentRouteName() == 'nosotros' ? 'font-bold' : '' }}">NOSOTROS</a>
                <a href="{{ route('categorias') }}"
                    class="{{ in_array(Route::currentRouteName(), ['categorias', 'productos', 'producto']) ? 'font-bold' : '' }}">PRODUCTOS</a>
                <a href="{{ route('servicios') }}"
                    class="{{ Route::currentRouteName() == 'servicios' ? 'font-bold' : '' }}">SERVICIOS</a>
                <a href="{{ route('clientes') }}"
                    class="{{ Route::currentRouteName() == 'clientes' ? 'font-bold' : '' }}">CLIENTES</a>
                <a href="{{ route('novedades') }}"
                    class="{{ in_array(Route::currentRouteName(), ['novedades', 'novedad']) ? 'font-bold' : '' }}">NOVEDADES</a>
                <a href="{{ route('contacto') }}"
                    class="{{ Route::currentRouteName() == 'contacto' ? 'font-bold' : '' }}">CONTACTO</a>
            </div>

            <!-- Botón -->
            <a href="{{ route('presupuesto') }}" class="w-[224px] transition-colors duration-300"
                :class="shouldShowScrolledStyle ? 'btn-primary' : 'btn-home'">
                SOLICITAR PRESUPUESTO
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbarData', () => ({
            scrolled: false,
            mobileMenuOpen: false,
            forceScrolledStyle: false,

            // Lista de rutas que deben mostrar siempre el estilo "scrolled"
            fixedScrollRoutes: ['novedad', 'productos', 'producto'], // Agrega aquí las rutas que necesites

            get shouldShowScrolledStyle() {
                return this.forceScrolledStyle || this.scrolled;
            },

            initNavbar() {
                // Verificar si la ruta actual debe tener estilo fijo
                const currentRoute = '{{ Route::currentRouteName() }}';
                this.forceScrolledStyle = this.fixedScrollRoutes.includes(currentRoute);

                // Solo agregar el listener de scroll si no estamos en una ruta con estilo fijo
                if (!this.forceScrolledStyle) {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 50;
                    });
                }
            }
        }));
    });
</script>
