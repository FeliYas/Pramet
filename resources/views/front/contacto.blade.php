@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Contacto'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-white h-[300px] lg:h-[400px]">
            <img src="{{ $banner->banner }}" alt="{{ __('Banner de Contacto') }}"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.53) 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(180deg, rgba(0, 0, 0, 0.81) 0%, rgba(0, 0, 0, 0.00) 100%);">
            </div>
            <div class="absolute hidden lg:block inset-0 top-26 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('contacto') }}" class=" font-light hover:underline">{{ __('Contacto') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center justify-center h-full">
                <div class="flex flex-col items-center text-center gap-1">
                    <h2 class="text-[48px] font-bold text-white mt-28">CONTACTO</h2>
                </div>
            </div>
        </div>
        
        <!-- Mensajes de feedback -->
        @if (session('success'))
            <div id="successMessage"
                class="fixed top-6 right-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ __(session('success')) }}</span>
                <button type="button" class="ml-auto" onclick="document.getElementById('successMessage').remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('successMessage');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
        @if (session('error'))
            <div id="errorMessage"
                class="fixed top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ __(session('error')) }}</span>
                <button type="button" class="ml-auto" onclick="document.getElementById('errorMessage').remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('errorMessage');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
        @if ($errors->any())
            <div id="validationErrors"
                class="fixed top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-bold">{{ __('Por favor corrija los siguientes errores:') }}</span>
                    <button type="button" class="ml-auto" onclick="document.getElementById('validationErrors').remove()">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ __($error) }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('validationErrors');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 7000);
            </script>
        @endif

        <div class="bg-white py-20 flex flex-col lg:flex-row gap-15 w-[90%] max-w-[1224px] mx-auto text-black">
            <div class="flex flex-col gap-5 lg:w-1/3 ">
                <a href="https://maps.google.com/?q={{ urlencode($contacto->direccion) }}" target="_blank"
                    class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <g fill="none" stroke="#FE9100" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <circle cx="12" cy="10" r="3" />
                                <path
                                    d="M12 2a8 8 0 0 0-8 8c0 1.892.402 3.13 1.5 4.5L12 22l6.5-7.5c1.098-1.37 1.5-2.608 1.5-4.5a8 8 0 0 0-8-8" />
                            </g>
                        </svg>
                        <p class="hover:text-[#FE9100] transition-colors duration-300 max-w-3/5">
                            {{ $contacto->direccion }}
                        </p>
                    </div>
                </a>
                <a href="tel:{{ preg_replace('/\s+/', '', $contacto->telefono) }}"
                    class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <g clip-path="url(#clip0_4114_234)">
                                <path
                                    d="M11.5265 13.8067C11.6986 13.8858 11.8925 13.9038 12.0762 13.8579C12.26 13.8121 12.4226 13.7049 12.5373 13.5542L12.8332 13.1667C12.9884 12.9598 13.1897 12.7917 13.4211 12.676C13.6526 12.5603 13.9078 12.5001 14.1665 12.5001H16.6665C17.1085 12.5001 17.5325 12.6757 17.845 12.9882C18.1576 13.3008 18.3332 13.7247 18.3332 14.1667V16.6667C18.3332 17.1088 18.1576 17.5327 17.845 17.8453C17.5325 18.1578 17.1085 18.3334 16.6665 18.3334C12.6883 18.3334 8.87295 16.7531 6.0599 13.94C3.24686 11.127 1.6665 7.31166 1.6665 3.33341C1.6665 2.89139 1.8421 2.46746 2.15466 2.1549C2.46722 1.84234 2.89114 1.66675 3.33317 1.66675H5.83317C6.2752 1.66675 6.69912 1.84234 7.01168 2.1549C7.32424 2.46746 7.49984 2.89139 7.49984 3.33341V5.83341C7.49984 6.09216 7.4396 6.34734 7.32388 6.57877C7.20817 6.8102 7.04016 7.0115 6.83317 7.16675L6.44317 7.45925C6.29018 7.57606 6.18235 7.74224 6.138 7.92954C6.09364 8.11684 6.11549 8.31373 6.19984 8.48675C7.33874 10.8 9.21186 12.6707 11.5265 13.8067Z"
                                    stroke="#FE9100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                <a href="mailto:{{ $contacto->email }}"
                    class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M16.6665 3.33325H3.33317C2.4127 3.33325 1.6665 4.07944 1.6665 4.99992V14.9999C1.6665 15.9204 2.4127 16.6666 3.33317 16.6666H16.6665C17.587 16.6666 18.3332 15.9204 18.3332 14.9999V4.99992C18.3332 4.07944 17.587 3.33325 16.6665 3.33325Z"
                                stroke="#FE9100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M18.3332 5.83325L10.8582 10.5833C10.6009 10.7444 10.3034 10.8299 9.99984 10.8299C9.69624 10.8299 9.39878 10.7444 9.1415 10.5833L1.6665 5.83325"
                                stroke="#FE9100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="hover:text-[#FE9100] transition-colors duration-300">
                            {{ $contacto->email }}
                        </p>
                    </div>
                </a>
                <a href="mailto:{{ $contacto->whatsapp }}"
                    class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M17.0073 2.90097C13.1303 -0.970609 6.85319 -0.965179 2.98161 2.9064C-0.184072 6.07752 -0.835671 10.9808 1.40148 14.8632L-0.00488281 20L5.25135 18.6154C6.70658 19.4081 8.33558 19.8208 9.99172 19.8208C15.4326 19.9077 19.9123 15.5691 19.9992 10.1283C20.0426 7.40786 18.9566 4.79061 17.0073 2.90097ZM9.99715 18.1538C8.5202 18.1538 7.07039 17.7574 5.79977 17.0081L5.50112 16.8289L2.38431 17.6488L3.2151 14.608L3.01962 14.2931C0.652145 10.3944 1.89561 5.31732 5.78891 2.94984C9.68764 0.582368 14.7647 1.82583 17.1322 5.71913C17.8978 6.98432 18.3159 8.4287 18.3322 9.91109C18.2833 14.4777 14.5692 18.1538 9.99715 18.1538ZM14.5149 11.9799C14.2706 11.855 13.0488 11.2577 12.8207 11.1763C12.5927 11.0948 12.4298 11.0514 12.2615 11.3012C12.0931 11.5509 11.6207 12.1048 11.4741 12.2731C11.3275 12.4415 11.1863 12.4632 10.9365 12.3383C9.48131 11.6107 8.52563 11.0405 7.56452 9.38981C7.30931 8.94998 7.81973 8.98256 8.29214 8.03774C8.3573 7.89656 8.35187 7.73366 8.27042 7.60334C8.21069 7.47845 7.71113 6.2567 7.50479 5.76258C7.30388 5.27931 7.09754 5.3499 6.9455 5.33904C6.80432 5.32818 6.63599 5.32818 6.47309 5.32818C6.21788 5.33361 5.97896 5.44764 5.81063 5.63769C5.24592 6.17525 4.93098 6.92459 4.94184 7.70651C5.02329 8.64047 5.37624 9.53099 5.95181 10.2695C6.0767 10.4324 7.70027 12.9356 10.1872 14.0107C11.7619 14.6895 12.3755 14.7492 13.1628 14.6297C13.6407 14.5592 14.6289 14.0324 14.8353 13.4514C14.9982 13.0822 15.047 12.6695 14.9765 12.2731C14.9167 12.1645 14.7538 12.0994 14.5095 11.9799H14.5149Z"
                                stroke="#FE9100" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="hover:text-[#FE9100] transition-colors duration-300">
                            {{ $contacto->whatsapp }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="lg:w-2/3">
                <form action="{{ route('contacto.enviar') }}" method="POST" class="w-full space-y-6" id="contactForm">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="w-full relative">
                            <label for="nombre" class="block mb-1">{{ __('Nombre y apellido') }} *</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="border border-[#DEDFE0] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                        </div>
                        <div class="w-full relative">
                            <label for="email" class="block mb-1">{{ __('E-mail') }} *</label>
                            <input type="text" name="email" id="email" required
                                class="border border-[#DEDFE0] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                        </div>
                    </div>
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="w-full relative">
                            <label for="telefono" class="block mb-1">{{ __('Telefono') }} *</label>
                            <input type="text" name="telefono" id="telefono" required
                                class="border border-[#DEDFE0] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                        </div>
                        <div class="w-full relative">
                            <label for="empresa" class="block mb-1">{{ __('Empresa') }}</label>
                            <input type="text" name="empresa" id="empresa"
                                class="border border-[#DEDFE0] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="w-full py-2 relative">
                            <label for="mensaje" class="block mb-1">{{ __('Mensaje') }} *</label>
                            <textarea name="mensaje" id="mensaje" cols="30" rows="10" required
                                class="border border-[#DEDFE0] w-full px-4 py-2 h-[158px] focus:border-main-color focus:outline-none transition-colors"></textarea>
                        </div>
                        <div class="w-full flex items-end justify-between gap-10 lg:mb-3">
                            <span class="mb-2">* Datos obligatorios</span>
                            <div class="mt-auto py-1 flex flex-col items-center justify-center ">
                                <!-- Agregamos campo oculto para almacenar el token de reCAPTCHA -->
                                <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
                                <button type="button" id="submitBtn" class="btn-negro w-full lg:w-[151px] relative">
                                    <span id="submitText" class="inline-block">{{ __('Enviar mensaje') }}</span>
                                    <span id="loadingIndicator"
                                        class="hidden absolute inset-0 items-center justify-center">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">{{ __('Enviando...') }}</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script de reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LcXQKUrAAAAAJU3TR4rTepCJ9iTI-mcAnrVoXab"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar evento al botón de envío
            const submitBtn = document.getElementById('submitBtn');
            if (submitBtn) {
                submitBtn.addEventListener('click', handleSubmit);
            }

            function handleSubmit(e) {
                e.preventDefault();

                // Mostrar indicador de carga
                const submitText = document.getElementById('submitText');
                const loadingIndicator = document.getElementById('loadingIndicator');
                const submitBtn = document.getElementById('submitBtn');

                // Desactivar el botón y mostrar el indicador de carga
                submitBtn.disabled = true;
                submitText.style.visibility = 'hidden'; // Usar visibility en lugar de display
                loadingIndicator.classList.remove('hidden');
                loadingIndicator.classList.add('flex'); // Asegurar que se muestre como flex

                // Activar reCAPTCHA
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LcXQKUrAAAAAJU3TR4rTepCJ9iTI-mcAnrVoXab', {
                        action: 'submit_contact'
                    }).then(function(token) {
                        // Guardar el token en el campo oculto
                        document.getElementById('recaptchaResponse').value = token;

                        // Enviar el formulario
                        submitBtn.closest('form').submit();
                    }).catch(function(error) {
                        // Restaurar el botón en caso de error
                        submitBtn.disabled = false;
                        submitText.style.visibility = 'visible'; // Restaurar visibilidad
                        loadingIndicator.classList.add('hidden');
                        loadingIndicator.classList.remove('flex');

                        console.error('Error de reCAPTCHA:', error);
                        alert('Error al procesar el formulario. Por favor, intenta nuevamente.');
                    });
                });
            }
        });
    </script>

    <style>
        /* Estilo para el placeholder */
        ::placeholder {
            color: #666 !important;
            opacity: 1;
        }

        /* Cuando el input está enfocado */
        input:focus::placeholder,
        textarea:focus::placeholder {
            opacity: 0.5;
        }

        /* Animación al enfocar los campos */
        input:focus,
        textarea:focus {
            border-color: #DCDCDC !important;
            box-shadow: 0 0 0 1px rgba(220, 220, 220, 0.2);
        }

        /* Estilo para los inputs con fondo transparente */
        input[type="text"],
        input[type="email"],
        textarea {
            background-color: transparent !important;
        }
    </style>
@endsection
