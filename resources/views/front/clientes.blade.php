@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Clientes'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-white h-[300px] lg:h-[400px]">
            <img src="{{ $banner->banner }}" alt="{{ __('Banner de Clientes') }}"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.53) 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(180deg, rgba(0, 0, 0, 0.81) 0%, rgba(0, 0, 0, 0.00) 100%);">
            </div>
            <div class="absolute hidden lg:block inset-0 top-26 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('clientes') }}" class=" font-light hover:underline">{{ __('Clientes') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center justify-center h-full">
                <div class="flex flex-col items-center text-center gap-1">
                    <h2 class="text-[48px] font-bold text-white mt-28">CLIENTES</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20 grid grid-cols-2 lg:grid-cols-4 gap-6 w-[90%] max-w-[1224px] mx-auto text-black">
            @foreach ($clientes as $cliente)
                <div class="h-[160px] max-w-[300px] bg-white p-4 shadow-md border border-gray-200">
                    <img src="{{ asset($cliente->path) }}" alt="cliente"
                        class="w-full h-full object-contain transition-all duration-300 filter grayscale hover:grayscale-0">
                </div>
            @endforeach
        </div>
    </div>
@endsection
