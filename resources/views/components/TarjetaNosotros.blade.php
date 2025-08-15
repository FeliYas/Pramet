@props(['tarjeta'])

<div
    class="bg-white px-6 flex flex-col justify-center items-center transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 group h-[450px] lg:h-[362px]">
    <div class="flex flex-col items-start justify-center h-full">
        <div class="transition-all duration-500 group-hover:scale-110 flex items-center justify-start h-[153px]">
            <img src="{{ asset($tarjeta->path) }}" alt="Icon"
                class="w-[70px] h-[70px] object-cover transition-all duration-300 group-hover:brightness-110">
        </div>
        <div class="w-full h-[209px] flex flex-col gap-5">
            <h3 class="text-xl text-black font-bold transition-all duration-300 group-hover:text-main-color">
                {{ $tarjeta->titulo }}</h3>
            <div class="text-black leading-relaxed transition-all duration-300 group-hover:text-gray-700">
                {!! $tarjeta->descripcion !!}
            </div>
        </div>
    </div>
</div>
