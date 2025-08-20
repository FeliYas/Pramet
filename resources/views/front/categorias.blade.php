    @extends('layouts.guest')
    @section('meta')
        <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
    @endsection

    @section('title', __('Productos'))

    @section('content')
        <div>
            <div class="relative overflow-hidden text-white h-[300px] lg:h-[400px]">
                <img src="{{ $banner->banner }}" alt="{{ __('Banner de Productos') }}"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0"
                    style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.53) 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(180deg, rgba(0, 0, 0, 0.81) 0%, rgba(0, 0, 0, 0.00) 100%);">
                </div>
                <div class="absolute hidden lg:block inset-0 top-26 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                    <div>
                        <div class="flex gap-1">
                            <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                            <span>></span>
                            <a href="{{ route('categorias') }}"
                                class=" font-light hover:underline">{{ __('Productos') }}</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center justify-center h-full">
                    <div class="flex flex-col items-center text-center gap-1">
                        <h2 class="text-[48px] font-bold text-white mt-28">PRODUCTOS</h2>
                    </div>
                </div>
            </div>
            <div class="py-20 w-[90%] max-w-[1224px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categorias as $cat)
                    <div class="h-[392px] relative group">
                        <img src="{{ $cat->path }}" alt="{{ $cat->titulo }} Image">
                        <div class="absolute inset-0 bg-black opacity-30"></div>

                        <!-- Contenedor de texto + botón -->
                        <div class="absolute inset-0 flex flex-col items-center justify-end">
                            <h3
                                class="text-white text-2xl font-semibold uppercase transform transition-all duration-300 group-hover:-translate-y-36">
                                {{ $cat->titulo }}
                            </h3>
                            <a href="{{ route('productos', $cat->id) }}"
                                class="btn-negro opacity-0 invisible transform transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:-translate-y-36">
                                MÁS INFO
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endsection
