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


                        <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl flex items-center">
                            <img src="{{ asset('img/unefa.png') }}" alt="Logo UNEFA" class="w-10 h-10 mr-2">
                            Bienvenidos a APLIB-UNEF
                        </h1>


                        <p class="mt-4 leading-relaxed text-gray-500 mb-4">
                            “La excelencia educativa al alcance del pueblo”
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
                                    Quiero recibir correos electrónicos sobre actualizaciones y
                                    anuncios de la BIBLIOTECA.
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
                                <a href="{{route("login")}}" class="text-gray-700 underline">Acceder</a>.
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
