<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Oswald:wght@200;300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,100;1,200;1,300;1,400;1,600;1,700&display=swap">



        <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-light.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-regular.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-solid.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-thin.css') }}">

        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('vendor/laravel_backup_panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">

        <style type="text/css">
            .letter {
                font-family: 'Raleway', sans-serif;
                font-size: 20px;
                font-weight: 200;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('assets/css/obfuscated.min.css') }}">

        @livewireStyles

    </head>

    <body class="letter">

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <x-sidebar />

            <!-- Page Content -->
            <main>
                <div class="w-full lg:ps-64">
                    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        <script src="{{ asset('assets/vendor/preline/dist/index.js?v=2.3.0') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        <x-livewire-alert::flash />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        @livewireScripts
    </body>

</html>
