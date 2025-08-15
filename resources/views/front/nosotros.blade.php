@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Nosotros'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-white h-[300px] lg:h-[400px]">
            <img src="{{ $banner->banner }}" alt="{{ __('Banner de Nosotros') }}"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.53) 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(180deg, rgba(0, 0, 0, 0.81) 0%, rgba(0, 0, 0, 0.00) 100%);">
            </div>
            <div class="absolute hidden lg:block inset-0 top-26 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('nosotros') }}" class=" font-light hover:underline">{{ __('Nosotros') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center justify-center h-full">
                <div class="flex flex-col items-center text-center gap-1">
                    <h2 class="text-[48px] font-bold text-white mt-28">NOSOTROS</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20">
            <div class="w-[90%] max-w-[1224px] mx-auto flex flex-col lg:flex-row gap-18">
                <div class="flex flex-col gap-3.5 lg:w-1/2 text-black justify-center">
                    <h2 class="font-bold text-[32px]">{{ $nosotros->titulo }}</h2>
                    <div class="custom-summernote text-lg">
                        <p>{!! $nosotros->descripcion !!}</p>
                    </div>
                </div>
                <img src="{{ $nosotros->path }}" alt="{{ __('Imagen de Nosotros') }}"
                    class="lg:w-1/2 h-[400px] lg:h-[600px] object-cover">

            </div>
        </div>
        <div class="bg-[#F5F5F5] py-20">
            <div class="w-[90%] max-w-[1224px] mx-auto">
                <div class="flex flex-col gap-5">
                    <h2 class="text-black text-[32px] font-semibold">{{ __('¿Por que elegirnos?') }}</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        @foreach ($tarjetas as $tarjeta)
                            <x-TarjetaNosotros :tarjeta="$tarjeta" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
