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
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.5823 11.985C14.3328 11.8608 13.1095 11.2625 12.8817 11.1792C12.6539 11.0967 12.4881 11.0558 12.3215 11.3042C12.1557 11.5508 11.6793 12.1092 11.5344 12.2742C11.3887 12.44 11.2438 12.46 10.9952 12.3367C10.7465 12.2117 9.94429 11.9508 8.99391 11.1075C8.25453 10.4509 7.75464 9.64002 7.60978 9.39169C7.46492 9.14419 7.59387 9.01002 7.71863 8.88669C7.83084 8.77585 7.96732 8.59752 8.09209 8.45335C8.21685 8.30835 8.25788 8.20502 8.34078 8.03919C8.42451 7.87419 8.38265 7.73002 8.31985 7.60585C8.25788 7.48169 7.7605 6.26252 7.55284 5.76669C7.35104 5.28419 7.14589 5.35003 6.99349 5.34169C6.8478 5.33503 6.682 5.33336 6.51621 5.33336C6.35041 5.33336 6.08079 5.39503 5.85303 5.64336C5.62444 5.89086 4.98219 6.49002 4.98219 7.70919C4.98219 8.92752 5.87313 10.105 5.99789 10.2709C6.12266 10.4359 7.75213 12.9375 10.2482 14.01C10.8428 14.265 11.3058 14.4175 11.6667 14.5308C12.2629 14.72 12.8055 14.6933 13.2342 14.6292C13.7115 14.5583 14.7063 14.03 14.9139 13.4517C15.1208 12.8733 15.1208 12.3775 15.0588 12.2742C14.9968 12.1708 14.831 12.1092 14.5815 11.985H14.5823ZM10.0423 18.1542H10.0389C8.55634 18.1544 7.10099 17.7578 5.8254 17.0058L5.52396 16.8275L2.39062 17.6458L3.22712 14.6058L3.03035 14.2942C2.20149 12.9811 1.76286 11.4615 1.76512 9.91085C1.7668 5.36919 5.47958 1.6742 10.0456 1.6742C12.2562 1.6742 14.3345 2.53253 15.897 4.08919C16.6676 4.85301 17.2785 5.76133 17.6941 6.7616C18.1098 7.76188 18.322 8.83425 18.3186 9.91668C18.3169 14.4583 14.6041 18.1542 10.0423 18.1542ZM17.086 2.9067C16.1634 1.98247 15.0657 1.24965 13.8564 0.7507C12.6472 0.251754 11.3505 -0.00339687 10.0414 3.41479e-05C4.55347 3.41479e-05 0.0854091 4.44586 0.0837344 9.91002C0.0811914 11.649 0.539563 13.3578 1.4126 14.8642L0 20L5.27861 18.6217C6.73884 19.4134 8.37519 19.8283 10.0381 19.8283H10.0423C15.5302 19.8283 19.9983 15.3825 20 9.91752C20.004 8.61525 19.7485 7.32511 19.2484 6.12172C18.7482 4.91833 18.0132 3.82559 17.086 2.9067Z"
                                fill="#FE9100" />
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
