@props(['logos', 'contactos', 'redes'])

<footer class="text-white">
    <div class="bg-black">
        <div
            class="grid grid-cols-1 lg:grid-cols-4 gap-10 lg:gap-6 justify-between w-[90%] xl:max-w-[1224px] mx-auto py-20">
            <div
                class="flex flex-col items-center md:items-center justify-center lg:justify-start gap-10 w-full lg:w-max">
                <img src="{{ asset($logos[0]->path) }}" alt="logo" class="object-contain h-[66px] ">

            </div>
            <div class="text-center lg:text-left flex flex-col gap-9">
                <h3 class="font-bold text-xl">{{ __('Secciones') }}</h3>
                <div class="flex flex-row md:pr-4 justify-center gap-6 md:gap-0 lg:justify-between lg:items-left">
                    <div class="flex flex-col gap-y-2">
                        <a href="{{ route('nosotros') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Nosotros') }}</a>
                        <a href="{{ route('categorias') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Productos') }}</a>
                        <a href="{{ route('servicios') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Servicios') }}</a>
                        <a href="{{ route('clientes') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Clientes') }}</a>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <a href="{{ route('presupuesto') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Solicitud de presupuesto') }}</a>
                        <a href="{{ route('novedades') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Novedades') }}</a>
                        <a href="{{ route('contacto') }}"
                            class="hover:text-[#FE9100] transition-colors duration-300">{{ __('Contacto') }}</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center lg:items-start text-center lg:text-start gap-9">
                <div class="flex flex-col items-center lg:items-start text-center lg:text-start gap-9">
                    <div>
                        <h3 class="font-bold text-xl w-[260px]">{{ __('Suscribite al Newsletter') }}
                        </h3>
                    </div>
                    <form id="newsletterForm" class="w-full h-[45px] flex flex-col items-center">
                        @csrf
                        <div class="w-[288px] h-[40px] border border-[#DCDCDC] flex justify-between">
                            <input type="email" name="email" placeholder="{{ __('Email') }}"
                                class="bg-transparent border-none outline-none p-3 w-full" required>
                            <button type="submit"
                                class="flex items-center justify-center rounded-r-[20px] px-3 cursor-pointer transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M8 12H16M16 12L12 16M16 12L12 8" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div id="newsletterMessage" class="text-xs mt-2"></div>
                    </form>
                </div>
                <div class="flex flex-col gap-5">
                    <div>
                        <h3 class="font-bold text-xl w-[260px]">{{ __('Seguinos en') }}
                        </h3>
                    </div>
                    <div class="flex gap-2 lg:justify-start justify-center">
                        @if ($redes->facebook)
                            <a href="{{ $redes->facebook }}" class="group hover:text-[#FE9100] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        @endif
                        @if ($redes->instagram)
                            <a href="{{ $redes->instagram }}" class="group hover:text-[#FE9100] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M17.5 6.5H17.51M7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7C2 4.23858 4.23858 2 7 2ZM16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5931 15.1514 13.8416 15.5297C13.0901 15.9079 12.2384 16.0396 11.4078 15.9059C10.5771 15.7723 9.80976 15.3801 9.21484 14.7852C8.61992 14.1902 8.22773 13.4229 8.09407 12.5922C7.9604 11.7616 8.09207 10.9099 8.47033 10.1584C8.84859 9.40685 9.45419 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87659 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.12831C15.4785 9.73515 15.8741 10.5211 16 11.37Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        @endif
                        @if ($redes->tiktok)
                            <a href="{{ $redes->tiktok }}" class="group hover:text-[#FE9100] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 28 28">
                                    <path fill="currentColor"
                                        d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-9">
                <div class="text-left w-full">
                    <h3 class="font-bold text-xl text-center lg:text-left">{{ __('Contacto') }}
                    </h3>
                </div>
                <div class="flex flex-col gap-4 items-center lg:items-start justify-center text-center lg:text-left">
                    @foreach ($contactos as $contacto)
                        @if ($contacto->direccion)
                            <a href="https://maps.google.com/?q={{ urlencode($contacto->direccion) }}" target="_blank"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24">
                                        <rect width="24" height="24" fill="none" />
                                        <g fill="none" stroke="#fdf6f6" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <circle cx="12" cy="10" r="3" />
                                            <path
                                                d="M12 2a8 8 0 0 0-8 8c0 1.892.402 3.13 1.5 4.5L12 22l6.5-7.5c1.098-1.37 1.5-2.608 1.5-4.5a8 8 0 0 0-8-8" />
                                        </g>
                                    </svg>
                                    <p class="hover:text-[#FE9100] transition-colors duration-300">
                                        {{ $contacto->direccion }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->telefono)
                            <a href="tel:{{ preg_replace('/\s+/', '', $contacto->telefono) }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_4114_234)">
                                            <path
                                                d="M11.5265 13.8067C11.6986 13.8858 11.8925 13.9038 12.0762 13.8579C12.26 13.8121 12.4226 13.7049 12.5373 13.5542L12.8332 13.1667C12.9884 12.9598 13.1897 12.7917 13.4211 12.676C13.6526 12.5603 13.9078 12.5001 14.1665 12.5001H16.6665C17.1085 12.5001 17.5325 12.6757 17.845 12.9882C18.1576 13.3008 18.3332 13.7247 18.3332 14.1667V16.6667C18.3332 17.1088 18.1576 17.5327 17.845 17.8453C17.5325 18.1578 17.1085 18.3334 16.6665 18.3334C12.6883 18.3334 8.87295 16.7531 6.0599 13.94C3.24686 11.127 1.6665 7.31166 1.6665 3.33341C1.6665 2.89139 1.8421 2.46746 2.15466 2.1549C2.46722 1.84234 2.89114 1.66675 3.33317 1.66675H5.83317C6.2752 1.66675 6.69912 1.84234 7.01168 2.1549C7.32424 2.46746 7.49984 2.89139 7.49984 3.33341V5.83341C7.49984 6.09216 7.4396 6.34734 7.32388 6.57877C7.20817 6.8102 7.04016 7.0115 6.83317 7.16675L6.44317 7.45925C6.29018 7.57606 6.18235 7.74224 6.138 7.92954C6.09364 8.11684 6.11549 8.31373 6.19984 8.48675C7.33874 10.8 9.21186 12.6707 11.5265 13.8067Z"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4114_234">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="hover:text-[#FE9100] transition-colors duration-300">
                                        {{ $contacto->telefono }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->email)
                            <a href="mailto:{{ $contacto->email }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M16.6665 3.33325H3.33317C2.4127 3.33325 1.6665 4.07944 1.6665 4.99992V14.9999C1.6665 15.9204 2.4127 16.6666 3.33317 16.6666H16.6665C17.587 16.6666 18.3332 15.9204 18.3332 14.9999V4.99992C18.3332 4.07944 17.587 3.33325 16.6665 3.33325Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.3332 5.83325L10.8582 10.5833C10.6009 10.7444 10.3034 10.8299 9.99984 10.8299C9.69624 10.8299 9.39878 10.7444 9.1415 10.5833L1.6665 5.83325"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="hover:text-[#FE9100] transition-colors duration-300">
                                        {{ $contacto->email }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->whatsapp)
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $contacto->whatsapp) }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M17.0073 2.90097C13.1303 -0.970609 6.85319 -0.965179 2.98161 2.9064C-0.184072 6.07752 -0.835671 10.9808 1.40148 14.8632L-0.00488281 20L5.25135 18.6154C6.70658 19.4081 8.33558 19.8208 9.99172 19.8208C15.4326 19.9077 19.9123 15.5691 19.9992 10.1283C20.0426 7.40786 18.9566 4.79061 17.0073 2.90097ZM9.99715 18.1538C8.5202 18.1538 7.07039 17.7574 5.79977 17.0081L5.50112 16.8289L2.38431 17.6488L3.2151 14.608L3.01962 14.2931C0.652145 10.3944 1.89561 5.31732 5.78891 2.94984C9.68764 0.582368 14.7647 1.82583 17.1322 5.71913C17.8978 6.98432 18.3159 8.4287 18.3322 9.91109C18.2833 14.4777 14.5692 18.1538 9.99715 18.1538ZM14.5149 11.9799C14.2706 11.855 13.0488 11.2577 12.8207 11.1763C12.5927 11.0948 12.4298 11.0514 12.2615 11.3012C12.0931 11.5509 11.6207 12.1048 11.4741 12.2731C11.3275 12.4415 11.1863 12.4632 10.9365 12.3383C9.48131 11.6107 8.52563 11.0405 7.56452 9.38981C7.30931 8.94998 7.81973 8.98256 8.29214 8.03774C8.3573 7.89656 8.35187 7.73366 8.27042 7.60334C8.21069 7.47845 7.71113 6.2567 7.50479 5.76258C7.30388 5.27931 7.09754 5.3499 6.9455 5.33904C6.80432 5.32818 6.63599 5.32818 6.47309 5.32818C6.21788 5.33361 5.97896 5.44764 5.81063 5.63769C5.24592 6.17525 4.93098 6.92459 4.94184 7.70651C5.02329 8.64047 5.37624 9.53099 5.95181 10.2695C6.0767 10.4324 7.70027 12.9356 10.1872 14.0107C11.7619 14.6895 12.3755 14.7492 13.1628 14.6297C13.6407 14.5592 14.6289 14.0324 14.8353 13.4514C14.9982 13.0822 15.047 12.6695 14.9765 12.2731C14.9167 12.1645 14.7538 12.0994 14.5095 11.9799H14.5149Z"
                                            fill="white" />
                                    </svg>
                                    <p class="hover:text-[#FE9100] transition-colors duration-300">
                                        {{ $contacto->whatsapp }}
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div
            class="flex flex-col lg:flex-row text-center lg:text-left justify-between gap-6 items-center w-[90%] max-w-[1224px] mx-auto py-3">
            <p>{{ __('© Copyright 2025 Pramet S.A. Todos los derechos reservados') }}</p>
            <p>{{ __('By') }}
                <a href="https://osole.com.ar/#"
                    class="font-bold hover:text-[#FE9100] transition-colors duration-300">
                    Osole
                </a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('newsletterForm');
            const messageDiv = document.getElementById('newsletterMessage');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const email = this.querySelector('input[name="email"]').value;
                    messageDiv.innerHTML = '<span class="text-blue-300">{{ __('Enviando...') }}</span>';
                    axios.post('{{ route('newsletter.store') }}', {
                            email,
                            _token: token
                        })
                        .then(function() {
                            messageDiv.innerHTML =
                                '<span class="text-green-500">{{ __('Suscripción exitosa') }}</span>';
                            form.reset();
                            setTimeout(() => {
                                messageDiv.innerHTML = '';
                            }, 3000);
                        })
                        .catch(function(error) {
                            let msg = '<span class="text-red-500">';
                            if (error.response?.data?.message) msg += error.response.data.message;
                            else if (error.request) msg += 'No se recibió respuesta del servidor';
                            else msg += 'Error al enviar la solicitud';
                            msg += '</span>';
                            messageDiv.innerHTML = msg;
                            setTimeout(() => {
                                messageDiv.innerHTML = '';
                            }, 3000);
                        });
                });
            }
        });
    </script>
</footer>
