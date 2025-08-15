@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Servicios'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-white h-[300px] lg:h-[400px]">
            <img src="{{ $banner->banner }}" alt="{{ __('Banner de Servicios') }}"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.53) 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(180deg, rgba(0, 0, 0, 0.81) 0%, rgba(0, 0, 0, 0.00) 100%);">
            </div>
            <div class="absolute hidden lg:block inset-0 top-26 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('servicios') }}" class=" font-light hover:underline">{{ __('Servicios') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center justify-center h-full">
                <div class="flex flex-col items-center text-center gap-1">
                    <h2 class="text-[48px] font-bold text-white mt-28">SERVICIOS</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20 grid grid-cols-2 lg:grid-cols-5 gap-6 w-[90%] max-w-[1224px] mx-auto text-black">
            @foreach ($servicios as $servicio)
                <div class="flex flex-col gap-3">
                    <img src="{{ $servicio->path }}" alt="{{ $servicio->titulo }}" class="w-11 h-11 object-cover">
                    <p class="text-2xl font-semibold min-h-[65px]">{{ $servicio->titulo }}</p>
                    <div class="custom-summernote text-sm">
                        <p>{!! $servicio->descripcion !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
