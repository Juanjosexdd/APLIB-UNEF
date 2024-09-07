<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
</head>

<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <section class="bg-white">
            <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
                <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-4">
                    <img alt=""
                        src="https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="absolute inset-0 h-full w-full object-cover" />
                </aside>

                <main
                    class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-8 lg:px-16 lg:py-12 xl:col-span-8">
                    <div class="max-w-xl lg:max-w-3xl">
                        <a class="block text-blue-600" href="#">
                            <span class="sr-only">Home</span>
                            <svg class="h-8 sm:h-10" viewBox="0 0 28 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                                    fill="currentColor" />
                            </svg>
                        </a>

                        <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Welcome to Squid 🦑
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500 mb-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam dolorum aliquam,
                            quibusdam aperiam voluptatum.
                        </p>

                        <div class="grid grid-cols-12 grid-rows-4 gap-4 mb-8">
                            <div class="col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Nombres
                                </label>

                                <input id="name" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 col-start-5">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">
                                    Apellidos
                                </label>

                                <input id="lastname" type="text" name="lastname" :value="old('lastname')" required
                                    autofocus autocomplete="lastname"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-2 col-start-9">
                                <label for="document_type_id" class="block text-sm font-medium text-gray-700">
                                    *
                                </label>
                                <x-select name="document_type_id" id="document_type_id"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                                    <option>Seleccione una opción</option>
                                    @foreach ($documentypes as $document_type)
                                        <option value="{{ $document_type->id }}">({{ $document_type->abbreviation }})
                                            {{ $document_type->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="col-span-3 col-start-11">
                                <label for="identification_card" class="block text-sm font-medium text-gray-700">
                                    Cedula
                                </label>

                                <input id="identification_card" type="text" name="identification_card"
                                    :value="old('identification_card')" required autofocus
                                    autocomplete="identification_card"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 row-start-2">
                                <label for="birthdate" class="block text-sm font-medium text-gray-700">
                                    F.Nacimiento
                                </label>
                                <input id="birthdate" type="date" name="birthdate" :value="old('birthdate')" required
                                    autofocus autocomplete="birthdate"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 col-start-5 row-start-2">
                                <label for="sex" class="block text-sm font-medium text-gray-700">
                                    Género
                                </label>
                                <div class="mt-4 flex items-center">
                                    <input id="sex" name="sex" type="radio" value="0"
                                        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" required />
                                    <label for="sex"
                                        class="ml-3 block text-sm font-medium text-gray-700">Masculino</label>
                                    <input id="sex" name="sex" type="radio" value="1"
                                        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500 ml-6"
                                        required />
                                    <label for="sex"
                                        class="ml-3 block text-sm font-medium text-gray-700">Femenino</label>
                                </div>
                            </div>
                            <div class="col-span-4 col-start-9 row-start-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">
                                    Telefono
                                </label>
                                <input id="phone" type="text" name="phone" :value="old('phone')" required
                                    autofocus autocomplete="phone"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 row-start-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Correo
                                </label>

                                <input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="email"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-8">
                                <label for="address" class="block text-sm font-medium text-gray-700">
                                    Dirección
                                </label>

                                <input id="address" type="text" name="address" :value="old('address')" required
                                    autofocus autocomplete="address"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 row-start-4">
                                <label for="username" class="block text-sm font-medium text-gray-700"> Usuario
                                </label>

                                <input id="username" type="text" name="username" :value="old('username')"
                                    required autofocus autocomplete="username"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 col-start-5 row-start-4">
                                <label for="Password" class="block text-sm font-medium text-gray-700"> Contraseña
                                </label>

                                <input type="password" id="password" name="password"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                            <div class="col-span-4 col-start-9 row-start-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                    Confirmar contraseña
                                </label>

                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="MarketingAccept" class="flex gap-4">
                                <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                                    class="size-5 rounded-md border-gray-200 bg-white shadow-sm" />

                                <span class="text-sm text-gray-700">
                                    Quiero recibir correos electrónicos sobre eventos, actualizaciones de productos y
                                    anuncios de la empresa.
                                </span>
                            </label>
                        </div>

                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                Al crear una cuenta, usted acepta nuestros
                                <a href="#" class="text-gray-700 underline"> terminos y condiciones </a>
                                y
                                <a href="#" class="text-gray-700 underline">politicas de privacidad</a>.
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                Crear cuenta nueva
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Ya tienes una cuenta?
                                <a href="#" class="text-gray-700 underline">Acceder</a>.
                            </p>
                        </div>
                    </div>
                </main>
            </div>
        </section>
    </form>
    @livewireScripts
</body>

</html>
