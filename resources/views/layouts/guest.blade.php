<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>APLIB-UNEF</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-light.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-regular.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-solid.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesomepro/css/sharp-thin.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/obfuscated.min.css') }}">

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap  md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200">
        <nav
            class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-2 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center gap-x-1">
                <a class="flex-none font-semibold text-xl  focus:outline-none focus:opacity-80 text-blue-800"
                    href="/" aria-label="Brand"><i class="fa-duotone fa-solid fa-books fa-lg"></i> APLIB-UNEF</a>
            </div>
            @livewire('search')
            {{-- <x-search /> --}}

            <!-- Collapse -->
            <div
                class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
                    <div class="grow">
                        <div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
                            <a class="p-2 flex items-center text-sm bg-gray-100 text-gray-800 hover:bg-gray-100 rounded-lg "
                                href="/" aria-current="page">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                                Inicio
                            </a>
                            <a class="p-2 flex items-center text-sm bg-gray-100 text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                href="{{ route('libros.index') }}" aria-current="page">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-library-big">
                                    <rect width="8" height="18" x="3" y="3" rx="1" />
                                    <path d="M7 3v18" />
                                    <path
                                        d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z" />
                                </svg>
                                Libros
                            </a>
                            <div
                                class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
                                <button id="hs-header-base-dropdown" type="button"
                                    class="hs-dropdown-toggle w-full p-2 flex items-center text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                    <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m3 10 2.5-2.5L3 5" />
                                        <path d="m3 19 2.5-2.5L3 14" />
                                        <path d="M10 6h11" />
                                        <path d="M10 12h11" />
                                        <path d="M10 18h11" />
                                    </svg>
                                    Categorias
                                    <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-[18px] after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100"
                                    role="menu" aria-orientation="vertical"
                                    aria-labelledby="hs-header-base-dropdown">
                                    <div class="py-1 md:px-1 space-y-0.5">
                                        @if ($categorias && count($categorias) > 0)
                                            @foreach ($categorias as $categoria)
                                                @if ($categoria->subcategorias && count($categoria->subcategorias) > 0)
                                                    <!-- Categoría con subcategorías -->
                                                    <div
                                                        class="hs-dropdown [--strategy:static] md:[--strategy:absolute] [--adaptive:none] md:[--trigger:hover] [--is-collapse:true] md:[--is-collapse:false] relative">
                                                        <button id="hs-header-base-dropdown-sub" type="button"
                                                            class="hs-dropdown-toggle w-full flex justify-between items-center text-sm text-gray-800 rounded-lg p-2 md:px-3 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                            {{ $categoria->nombre }}
                                                            <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:-rotate-90 md:-rotate-90 duration-300 ms-auto shrink-0 size-4"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="m6 9 6 6 6-6" />
                                                            </svg>
                                                        </button>

                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative md:w-48 hidden z-10 md:mt-2 md:!mx-[10px] md:top-0 md:end-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:hidden md:before:block before:absolute before:-end-5 before:top-0 before:h-full before:w-5 md:after:hidden after:absolute after:top-1 after:start-[18px] after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="hs-header-base-dropdown-sub">
                                                            <div class="p-1 space-y-1">
                                                                @foreach ($categoria->subcategorias as $subcategoria)
                                                                    <a class="p-2 md:px-3 flex items-center text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                        href="#">
                                                                        {{ $subcategoria->nombre }}
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <!-- Categoría sin subcategorías -->
                                                    <a class="p-2 md:px-3 flex items-center text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                        href="#">
                                                        {{ $categoria->nombre }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No hay categorías disponibles.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Dropdown -->
                            <div
                                class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
                                <button id="hs-header-base-dropdown" type="button"
                                    class="hs-dropdown-toggle w-full p-2 flex items-center text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                                    <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-graduation-cap">
                                        <path
                                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                                        <path d="M22 10v6" />
                                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                                    </svg>
                                    Carreras
                                    <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-[18px] after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100"
                                    role="menu" aria-orientation="vertical"
                                    aria-labelledby="hs-header-base-dropdown">
                                    <div class="py-1 md:px-1 space-y-0.5">
                                        @foreach ($carreras as $carrera)
                                            <a class="p-2 md:px-3 flex items-center text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                href="#">
                                                {{ $carrera->nombre }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <a class="p-2 flex items-center text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                href="{{ route('dashboard') }}">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-layout-dashboard">
                                    <rect width="7" height="9" x="3" y="3" rx="1" />
                                    <rect width="7" height="5" x="14" y="3" rx="1" />
                                    <rect width="7" height="9" x="14" y="12" rx="1" />
                                    <rect width="7" height="5" x="3" y="16" rx="1" />
                                </svg>
                                Administrativo
                            </a>
                        </div>
                    </div>

                    <div class="my-2 md:my-0 md:mx-2">
                        <div class="w-full h-px md:w-px md:h-4 bg-gray-100 md:bg-gray-300"></div>
                    </div>

                    <!-- Button Group -->
                    @auth
                        <a class="decoration-1 cursor-pointer"
                            href="{{ route('profile.show') }}">{{ Auth::user()->name }}
                            {{ Auth::user()->lastname }}</a>
                    @else
                        <div class=" flex flex-wrap items-center gap-x-1.5">
                            <a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="{{route("login")}}">
                                Iniciar sesión
                            </a>
                            <a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg    focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="{{route("register")}}">
                                    Registrase
                            </a>
                        </div>
                    @endauth
                    <!-- End Button Group -->
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->


    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>
    </div>





    <footer class="bg-white rounded-lg shadow m-4 ">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="#"
                    class="hover:underline"></a>.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6"></a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6"></a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6"></a>
                </li>
                <li>
                    <a href="#" class="hover:underline"></a>
                </li>
            </ul>
        </div>
    </footer>


    <script src="{{ asset('assets/vendor/preline/dist/index.js?v=2.3.0') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @livewireScripts
</body>

</html>
