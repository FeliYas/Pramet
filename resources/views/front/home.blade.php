@extends('layouts.guest')
@section('title', __('Home'))

@section('content')
    <div>
        <!-- Hero Slider Section -->
        <div class="overflow-hidden">
            <div class="slider-track flex transition-transform duration-500 ease-in-out">
                @foreach ($sliders as $slider)
                    @php $ext = pathinfo($slider->path, PATHINFO_EXTENSION); @endphp
                    <div class="slider-item min-w-full relative h-[600px] lg:h-[768px]">
                        <div class="absolute inset-0 bg-black z-0 overflow-hidden">
                            @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <img src="{{ asset($slider->path) }}" alt="Slider Image" class="w-full h-full object-cover"
                                    data-duration="6000">
                            @elseif (in_array($ext, ['mp4', 'webm', 'ogg']))
                                <video class="w-full h-full object-cover" autoplay muted onended="nextSlide()">
                                    <source src="{{ asset($slider->path) }}" type="video/{{ $ext }}">
                                    {{ __('Tu navegador no soporta el formato de video.') }}
                                </video>
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-black opacity-40" style="mix-blend-mode: darken;">
                        </div>
                        <div class="absolute inset-0 flex z-20 lg:max-w-[1224px] lg:mx-auto">
                            <div
                                class="relative flex flex-col gap-4 sm:gap-6 lg:gap-10 w-full justify-center items-center text-center mb-20">
                                <div
                                    class="max-w-[320px] sm:max-w-[400px] lg:max-w-[700px] text-white flex flex-col gap-2 lg:gap-6 items-center mt-10">
                                    <h1
                                        class="text-3xl lg:text-5xl font-bold leading-tight sm:leading-normal lg:leading-14">
                                        {{ $slider->titulo }}</h1>
                                    {{-- <div class="custom-summernote text-xl sm:text-2xl mt-1">
                                        <p>{!! $slider->descripcion !!}</p>
                                    </div> --}}
                                    <a href="{{ route('nosotros') }}" class="btn-home w-[128px]">MÁS INFO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation Dots -->
            <div class="relative lg:max-w-[1224px] lg:mx-auto">
                <div class="absolute bottom-4 sm:bottom-6 lg:bottom-13 w-full z-30 flex justify-center">
                    <div class="flex items-center space-x-1 lg:space-x-2">
                        @foreach ($sliders as $i => $slider)
                            <button
                                class="cursor-pointer dot w-4 sm:w-6 lg:w-12 h-1 sm:h-1.5 rounded-none transition-colors duration-300 bg-white {{ $i === 0 ? 'opacity-90' : 'opacity-50' }}"
                                data-dot-index="{{ $i }}" onclick="goToSlide({{ $i }})"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sliderTrack = document.querySelector('.slider-track');
                const sliderItems = document.querySelectorAll('.slider-item');
                const dots = document.querySelectorAll('.dot');
                let currentIndex = 0,
                    autoSlideTimeout, isTransitioning = false;

                window.nextSlide = () => {
                    if (isTransitioning) return;
                    clearTimeout(autoSlideTimeout);
                    currentIndex = (currentIndex + 1) % sliderItems.length;
                    updateSlider();
                };
                window.goToSlide = i => {
                    if (isTransitioning || i === currentIndex) return;
                    clearTimeout(autoSlideTimeout);
                    currentIndex = i;
                    updateSlider();
                };

                function updateSlider() {
                    isTransitioning = true;
                    sliderItems.forEach(item => item.querySelector('video')?.pause());
                    sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
                    dots.forEach((dot, i) => dot.classList.toggle('opacity-90', i === currentIndex) || dot.classList
                        .toggle('opacity-50', i !== currentIndex));
                    scheduleNextSlide();
                    setTimeout(() => isTransitioning = false, 500);
                }

                function scheduleNextSlide() {
                    clearTimeout(autoSlideTimeout);
                    const slide = sliderItems[currentIndex],
                        video = slide.querySelector('video'),
                        img = slide.querySelector('img');
                    if (video) {
                        video.currentTime = 0;
                        video.play();
                    } else autoSlideTimeout = setTimeout(window.nextSlide, img?.dataset.duration ? +img.dataset
                        .duration : 6000);
                }
                sliderItems.forEach(item => item.querySelector('video') && (item.querySelector('video').onended = window
                    .nextSlide));
                updateSlider();
            });
        </script>

        {{-- Productos section --}}
        <div class="py-20 flex flex-col gap-7 items-center w-[90%] max-w-[1224px] mx-auto">
            <h2 class="text-[40px] font-bold text-black">Nuestros productos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categorias as $cat)
                    <a href="{{route('productos', $cat->id)}}"
                        class="h-[392px] relative transition-transform duration-300 ease-in-out hover:-translate-y-2 shadow hover:shadow-lg">
                        <img src="{{ $cat->path }}" alt="{{ $cat->titulo }} Image">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex items-end justify-center mb-6">
                            <h3 class="text-white text-2xl font-semibold uppercase">{{ $cat->titulo }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex flex-col lg:flex-row gap-0 lg:gap-22 bg-black">

            <img src="{{ $contenido->path }}" alt="{{ __('Contenido de la pagina') }}"
                class="w-full lg:w-[50vw] h-[400px] lg:h-[600px] object-cover opacity-0 -translate-x-20 transition-all duration-2000 ease-in-out scroll-fade-left">
            <div
                class="w-full h-[500px] lg:h-[600px] lg:w-1/2 pl-[5%] pr-[5%] lg:pl-0 lg:pr-[calc((100vw-1224px)/2)] py-7 flex flex-col opacity-0 translate-x-20 transition-all duration-2000 ease-in-out scroll-fade-right items-center md:items-start justify-center text-white gap-6 lg:gap-17">
                <div class="flex flex-col gap-4 sm:gap-6 w-full">
                    <h2 class="font-bold text-3xl lg:text-[40px] text-center lg:text-left">
                        {{ $contenido->titulo }}</h2>
                    <div class="custom-summernote text-center lg:text-left text-lg">
                        <p>{!! $contenido->descripcion !!}</p>
                    </div>
                </div>
                <a href="{{ route('nosotros') }}" class="btn-home w-[128px]">MÁS INFO</a>
            </div>
        </div>
        <!-- Scroll Animation Script -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const element = entry.target;

                            // Remueve las clases de estado inicial
                            element.classList.remove('opacity-0');

                            // Remueve las clases de transformación según el tipo de fade
                            if (element.classList.contains('scroll-fade-left')) {
                                element.classList.remove('-translate-x-20');
                            }
                            if (element.classList.contains('scroll-fade-right')) {
                                element.classList.remove('translate-x-20');
                            }

                            // Opcional: para evitar re-observar elementos ya animados
                            observer.unobserve(element);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px' // Activa la animación un poco antes
                });

                // Observa todos los elementos con las clases de scroll fade
                document.querySelectorAll('.scroll-fade-right, .scroll-fade-left').forEach(el => {
                    observer.observe(el);
                });
            });
        </script>

        {{-- Novedades section --}}
        <div class="py-20 flex flex-col gap-7 items-center w-[90%] max-w-[1224px] mx-auto">
            <h2 class="text-[40px] font-bold text-black">Novedades</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($novedades as $novedad)
                    <div
                        class="h-[520px] relative transition-transform duration-300 ease-in-out hover:-translate-y-2 hover:shadow-lg group">
                        <img src="{{ $novedad->path }}" alt="{{ $novedad->titulo }} Image"
                            class="w-full h-[288px] object-cover">
                        <div
                            class="flex flex-col gap-4 pt-4 text-black group-hover:px-1 transition-all duration-300 ease-in-out h-[232px]">
                            <div class="h-[90px]">
                                <p>{{ ucfirst($novedad->epigrafe) }} | {{ $novedad->created_at->format('d/m/Y') }}</p>
                                <h3 class=" text-2xl font-semibold line-clamp-2">{{ $novedad->titulo }}</h3>
                            </div>
                            <div class="h-[110px] flex flex-col justify-between">
                                <div class="custom-summernote">
                                    <p>{!! $novedad->descripcion !!}</p>
                                </div>
                                <a href="{{ route('novedad', $novedad->id) }}"
                                    class="text-[#808080] group-hover:underline group-hover:text-[#FE9100] transition-colors duration-300">VER
                                    MÁS</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-[#F5F5F5] py-16 pb-20">
            <div class="flex flex-col gap-6 max-w-[90%] lg:max-w-[1224px] mx-auto">
                <div class="flex justify-center items-center">
                    <h2 class="text-[40px] font-bold text-black text-center">Clientes</h2>
                </div>
                <div class="relative" x-data="{
                    activeSlide: 0,
                    totalSlides: 0,
                    autoSlideInterval: null,
                    isMobile: window.innerWidth < 1024,
                    clientesCount: {{ count($clientes) }},
                
                    init() {
                        this.calculateTotalSlides();
                        this.startAutoSlide();
                
                        // Actualizar cuando cambie el tamaño de la ventana
                        window.addEventListener('resize', () => {
                            this.isMobile = window.innerWidth < 1024;
                            this.calculateTotalSlides();
                            this.activeSlide = 0; // Reiniciar a la primera diapositiva al cambiar de tamaño
                            this.stopAutoSlide();
                            this.startAutoSlide();
                        });
                    },
                
                    calculateTotalSlides() {
                        if (this.isMobile) {
                            this.totalSlides = this.clientesCount;
                        } else {
                            this.totalSlides = Math.ceil(this.clientesCount / 4);
                        }
                        console.log('Total slides:', this.totalSlides, 'Is mobile:', this.isMobile);
                    },
                
                    startAutoSlide() {
                        if (this.totalSlides <= 1) return; // No iniciar si solo hay 1 slide
                
                        this.autoSlideInterval = setInterval(() => {
                            this.nextSlide();
                        }, this.isMobile ? 3000 : 5000);
                    },
                
                    stopAutoSlide() {
                        if (this.autoSlideInterval) {
                            clearInterval(this.autoSlideInterval);
                            this.autoSlideInterval = null;
                        }
                    },
                
                    nextSlide() {
                        if (this.totalSlides <= 1) return;
                
                        this.activeSlide = this.activeSlide + 1;
                        if (this.activeSlide >= this.totalSlides) {
                            this.activeSlide = 0;
                        }
                        console.log('Next slide:', this.activeSlide, 'of', this.totalSlides);
                    },
                
                    prevSlide() {
                        if (this.totalSlides <= 1) return;
                
                        this.activeSlide = this.activeSlide - 1;
                        if (this.activeSlide < 0) {
                            this.activeSlide = this.totalSlides - 1;
                        }
                    },
                
                    goToSlide(index) {
                        if (index >= 0 && index < this.totalSlides) {
                            this.activeSlide = index;
                        }
                    }
                }" @mouseover="stopAutoSlide()" @mouseleave="startAutoSlide()">

                    <!-- Carrusel de clientes -->
                    <div class="overflow-hidden relative">
                        <!-- Versión para escritorio (oculta en móvil) -->
                        <div class="hidden lg:flex transition-transform duration-500 ease-in-out"
                            :style="`transform: translateX(-${activeSlide * 100}%)`">

                            @php
                                $chunkedClientes = $clientes->chunk(4);
                            @endphp

                            @foreach ($chunkedClientes as $chunk)
                                <div class="grid grid-cols-4 justify-between gap-6 min-w-full py-4">
                                    @foreach ($chunk as $cliente)
                                        <div class="h-[160px] max-w-[300px] bg-white p-4 shadow-md">
                                            <img src="{{ asset($cliente->path) }}" alt="cliente"
                                                class="w-full h-full object-contain transition-all duration-300 filter grayscale hover:grayscale-0">
                                        </div>
                                    @endforeach

                                    <!-- Agrega divs vacíos para mantener la estructura si hay menos de 4 items en el chunk -->
                                    @for ($i = count($chunk); $i < 4; $i++)
                                        <div class="h-[190px] max-w-[300px] "></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>

                        <!-- Versión para móvil (oculta en escritorio) -->
                        <div class="lg:hidden flex transition-transform duration-500 ease-in-out"
                            :style="`transform: translateX(-${activeSlide * 100}%)`">

                            @foreach ($clientes as $cliente)
                                <div class="min-w-full flex justify-center">
                                    <div class="max-h-[190px] max-w-[300px] w-full bg-white">
                                        <img src="{{ asset($cliente->path) }}" alt="cliente"
                                            class="w-full h-full object-cover transition-all duration-300 filter lg:grayscale hover:grayscale-0">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Indicadores de paginación con forma de barras -->
                    <template x-if="totalSlides > 1">
                        <div class="absolute -bottom-10 left-0 right-0 flex justify-center space-x-2 mt-6">
                            <template x-for="(slide, index) in Array.from({length: totalSlides})" :key="index">
                                <button @click="goToSlide(index)"
                                    :class="{ 'bg-gray-400': activeSlide === index, 'bg-gray-200': activeSlide !== index }"
                                    class="w-10 h-1.5 cursor-pointer transition-colors duration-300"></button>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>


@endsection
