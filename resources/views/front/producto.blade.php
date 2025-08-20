@extends('layouts.guest')

@section('title', __('Productos'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-black lg:h-[30px]">
            <div class="absolute hidden lg:block inset-0 top-3 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('categorias') }}" class="font-bold hover:underline">{{ __('Productos') }}</a>
                        <span>></span>
                        <a href="{{ route('productos', $producto->categoria->id) }}"
                            class="font-bold hover:underline">{{ $producto->categoria->titulo }}</a>
                        <span>></span>
                        <a href="{{ route('producto', $producto->id) }}" class="hover:underline">{{ $producto->titulo }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-5 py-10 lg:py-20 w-[90%] lg:max-w-[1224px] mx-auto text-black">
            <div class="flex flex-col lg:flex-row gap-6 mb-18">
                <div class="flex flex-col lg:flex-row w-full lg:w-1/2 gap-6">
                    <div class="lg:w-[13%] grid grid-cols-3 lg:flex lg:flex-col gap-2.5">
                        <!-- Imagen principal del producto -->
                        <img src="{{ $producto->path }}" alt="{{ $producto->titulo }}"
                            class="gallery-thumb border border-[#DEDFE0] rounded-sm w-full h-25 lg:h-20 object-cover cursor-pointer hover:opacity-80 transition-all duration-200 active-thumb"
                            onclick="changeMainImage(this.src)">

                        <!-- Imágenes de la galería -->
                        @foreach ($producto->galeria as $imagen)
                            <img src="{{ $imagen->path }}" alt="{{ $producto->titulo }}"
                                class="gallery-thumb border border-[#DEDFE0] rounded-sm w-full h-25 lg:h-20 object-cover cursor-pointer hover:opacity-80 transition-all duration-200"
                                onclick="changeMainImage(this.src)">
                        @endforeach
                    </div>

                    <!-- Imagen principal grande -->
                    <img id="mainImage" src="{{ $producto->path }}" alt="{{ $producto->titulo }}"
                        class="border border-[#DEDFE0] rounded-sm h-[350px] lg:h-[496px] w-[85%] object-cover transition-all duration-300">
                </div>
                <div class="flex flex-col lg:w-1/2 justify-between h-[496px] ">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <p class="text-sm h-4">{{ $producto->categoria->titulo }}</p>
                            <h2 class="text-[32px] font-semibold h-10 border-b border-[#DEDFE0]">{{ $producto->titulo }}
                            </h2>
                        </div>
                        <div>
                            <p class="font-bold h-6">Caracteristicas</p>
                            <div class="flex flex-col divide-y divide-gray-300 border-y border-[#DEDFE0]">
                                @foreach ($producto->caracteristicas as $caracteristica)
                                    <div class="flex justify-between p-1 odd:bg-white even:bg-gray-100">
                                        <p>{{ ucfirst($caracteristica->titulo) }}</p>
                                        <p class="flex justify-end">{{ ucfirst($caracteristica->valor) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($producto->manual || $producto->memoria)
                        <div class="flex flex-col gap-2">
                            <div class="flex gap-6 w-full">
                                @if ($producto->manual)
                                    <a href="{{ $producto->manual }}" class="w-1/2 btn-primary">Manual de uso</a>
                                @endif
                                @if ($producto->memoria)
                                    <a href="{{ $producto->memoria }}" class="w-1/2 btn-primary">Memoria descriptiva</a>
                                @endif
                            </div>
                            <div class="flex w-full">
                                <a href="{{ route('contacto') }}" class="btn-negro w-full">Consultar</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if ($producto->constructivas || $producto->tablero || $producto->quemador)
                <div class="flex flex-col lg:flex-row gap-6">
                    @if ($producto->constructivas)
                        <div class="flex flex-col gap-6 w-1/3">
                            <h2 class="text-2xl font-semibold">Características Constructivas</h2>
                            <div class="custom-summernote">
                                <p>{!! $producto->constructivas !!}</p>
                            </div>
                        </div>
                    @endif
                    @if ($producto->tablero)
                        <div class="flex flex-col gap-6 w-1/3">
                            <h2 class="text-2xl font-semibold">Tablero Eléctrico</h2>
                            <div class="custom-summernote">
                                <p>{!! $producto->tablero !!}</p>
                            </div>
                        </div>
                    @endif
                    @if ($producto->quemador)
                        <div class="flex flex-col gap-6 w-1/3">
                            <h2 class="text-2xl font-semibold">Características del Quemador</h2>
                            <div class="custom-summernote">
                                <p>{!! $producto->quemador !!}</p>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Estilo para la imagen activa/seleccionada */
        .active-thumb {
            border-color: #FE9100 !important;
            border-width: 2px !important;
        }

        /* Efecto hover mejorado */
        .gallery-thumb:hover {
            transform: scale(1.02);
        }
    </style>

    <script>
        function changeMainImage(imageSrc) {
            // Cambiar la imagen principal
            const mainImage = document.getElementById('mainImage');
            mainImage.src = imageSrc;

            // Remover la clase active-thumb de todas las imágenes
            const thumbnails = document.querySelectorAll('.gallery-thumb');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('active-thumb');
            });

            // Encontrar la imagen clickeada y agregarle la clase active-thumb
            const clickedImage = document.querySelector(`img[src="${imageSrc}"].gallery-thumb`);
            if (clickedImage) {
                clickedImage.classList.add('active-thumb');
            }
        }
    </script>
@endsection
