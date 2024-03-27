<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'RADIO UPEA' }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('medias/assets/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 10000;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            /* background: radial-gradient(circle, #000, #474747); */
        }

        .loader-container img {
            width: 35rem;
        }

        .loader-container.fade-out {
            top: -110%;
            opacity: 0;
        }
    </style>
    <script>
        function loader() {
            document.querySelector(".loader-container").classList.add("fade-out");
        }

        function fadeOut() {
            setInterval(loader, 500);
        }

        window.onload = fadeOut;
    </script>

</head>

<body>
    <!-- loader part  -->
    <div class="loader-container">
        <img class="w-96" src="{{ asset('medias/assets/img/logo.gif') }}" alt="">
    </div>

    <section class="bg-gray-50 min-h-screen flex items-center justify-center"
        style="background: radial-gradient(circle, #3498db, #2c3e50);">
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="text-center font-bold text-2xl text-[#002D74] hover:cursor-pointer">RADIO UPEA</h2>
                <p class="text-center text-xs mt-4 text-[#002D74] hover:cursor-pointer">Ingresa tus credenciales para
                    tener acceso al sistema.</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                    @csrf
                    <div class="relative mt-6">
                        <x-input-error :messages="$errors->get('email')" class="mb-2" />
                        {{-- @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}

                        <div class="relative">
                            <input class="pr-9 p-2  rounded-xl border w-full" id="email" type="email"
                                name="email" placeholder="Email" :value="old('email')" required autofocus
                                autocomplete="username">
                            <span class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2">
                                <ion-icon name="mail-outline"></ion-icon>
                                {{-- <ion-icon name="person-outline"></ion-icon> --}}
                            </span>
                        </div>

                        <x-input-error :messages="$errors->get('password')" />
                        {{-- @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror --}}

                        <div class="relative mt-4">
                            <input class="pr-9 p-2 rounded-xl border w-full" id="password" type="password"
                                name="password" placeholder="Password" required autocomplete="current-password">
                            <button type="button" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2"
                                id="togglePassword">
                                <span id="mostrar">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </span>
                            </button>
                        </div>
                    </div>

                    <button
                        class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300 focus-visible:outline-white">INICIAR
                        SESIÓN</button>
                </form>

                <div class="mt-3 text-xs flex justify-center items-center text-[#002D74]">
                    <a class="hover:text-black hover:scale-110 duration-300" href="/">VOLVER</a>
                </div>
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="{{ asset('medias/assets/img/logo.png') }}">
            </div>
        </div>
    </section>

    <script>
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");
        const mostrarIcon = document.getElementById("mostrar");

        togglePasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                mostrarIcon.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
            } else {
                passwordInput.type = "password";
                mostrarIcon.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
            }
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
