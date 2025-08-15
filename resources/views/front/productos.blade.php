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
                            <a href="{{ route('productos', $categoria->id) }}"
                                class="hover:underline">{{ $categoria->titulo }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col lg:flex-row items-start gap-6 lg:py-15 lg:mb-30 max-w-[90%] lg:max-w-[1224px] mx-auto mt-6 lg:mt-0">
                <div class="w-full lg:w-1/4 text-black border py-1 px-4 border-[#DEDFE0]">
                    <h2 class="font-bold text-xl border-b border-gray-200 py-2">{{ __('Categorias') }}</h2>
                    <div class="py-2">
                        @foreach ($categorias as $cat)
                            <a href="{{ route('productos', $cat->id) }}"
                                class="block py-1.5 hover:bg-gray-100 hover:pl-3 transition-all duration-300 ease-in-out{{ request('id') == $cat->id ? ' font-bold' : '' }}">
                                {{ $cat->titulo }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="w-full lg:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4 lg:py-0">
                        @forelse($productos as $producto)
                            <a href="{{ route('producto', $producto->id) }}"
                                class="group h-[396px] border border-[#DEDFE0] text-black transition-transform duration-200 ease-in-out hover:shadow-lg hover:-translate-y-1">
                                <img src="{{ $producto->path }}" alt="{{ $producto->titulo }}"
                                    class="h-[287px] object-cover w-full">
                                <div class="flex flex-col items-center justify-center gap-1 h-[107px]">
                                    <h3 class="text-sm">{{ $producto->categoria->titulo }}</h3>
                                    <p class="text-xl font-semibold">{{ $producto->titulo }}</p>
                                </div>
                        </a> @empty
                            <div class="col-span-3 py-8 text-center text-gray-500">
                                {{ __('No hay productos disponibles en esta categoría.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    @endsection
