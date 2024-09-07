<aside id="hs-pro-sidebar"
    class="hs-overlay [--auto-close:lg]
hs-overlay-open:translate-x-0
-translate-x-full ufvz5 sk78w cerfw
pjux0 l9d31
hidden
fixed wn9zx ijvmh k4wdq
i46tf bwgg6 qqcco
nci9t a1rgx z1x84 r8t5y
dark:bg-neutral-800 dark:border-neutral-700
">
    <div class="relative flex c7lcd l9d31 iqzrg m6mls">
        <header class="r2enm klmzs">
            <!-- Logo -->
            <a class="v51h5 iunyp jla8o jwq0g gis44 v2n9r edgtt text-blue-800 no-underline" href="/" aria-label="Preline">
                <i class="fa-duotone fa-solid fa-books fa-lg"></i> APLIB-UNEF
            </a>
            <!-- End Logo -->
        </header>

        <!-- Content -->
        <div
            class="ry12z l9d31 kj88d ytzad ji9rb jvovv dmt9v dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <!-- Nav -->
            <nav class="hs-accordion-group h926i  nt0di flex c7lcd flex-wrap" data-hs-accordion-always-open="">
                <ul>
                    <!-- Link -->
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            <i class="fa-duotone fa-house fa-lg"></i> Dashboard
                        </x-sidebar-link>
                    </li>
                    <!-- End Link -->

                    <!-- Link -->
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            <i class="fa-regular fa-circle-user fa-lg mt-0.5"></i> Mi Perfil
                        </x-sidebar-link>
                    </li>
                    <li
                        class="dqn44 klmzs pc1v2 vme7x dtwk2 qqcco y0zlk kj8vc dark:border-neutral-700 dark:first:border-transparent">
                        <span class="block dinuv p9x45 k9fz5 dark:text-neutral-500">
                            SOLICITUDES
                        </span>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('solicitud-libros.index') }}" :active="request()->routeIs('solicitud-libros.index')">
                            <i class="fa-duotone fa-books fa-lg mt-0.5"></i> Solicitudes
                        </x-sidebar-link>
                    </li>
                    <li
                        class="dqn44 klmzs pc1v2 vme7x dtwk2 qqcco y0zlk kj8vc dark:border-neutral-700 dark:first:border-transparent">
                        <span class="block dinuv p9x45 k9fz5 dark:text-neutral-500">
                            CONFIGURACION
                        </span>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('configuracion.libros.index') }}" :active="request()->routeIs('configuracion.libros.index')">
                            <i class="fa-duotone fa-books fa-lg mt-0.5"></i> Libros
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('configuracion.carreras.index') }}" :active="request()->routeIs('configuracion.carreras.index')">
                            <i class="fa-duotone fa-user-graduate fa-lg mt-0.5"></i> Carreras
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('configuracion.categorias.index') }}" :active="request()->routeIs('configuracion.categorias.index')">
                            <i class="fa-regular fa-layer-group fa-lg mt-0.5"></i> Categorias
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('configuracion.subcategorias.index') }}" :active="request()->routeIs('configuracion.subcategorias.index')">
                            <i class="fa-duotone fa-layer-group fa-lg mt-0.5"></i> SubCategorias
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('configuracion.tipodocumentos.index') }}" :active="request()->routeIs('configuracion.tipodocumentos.index')">
                            <i class="fa-duotone fa-id-card fa-lg mt-0.5"></i> Tipo de documentos
                        </x-sidebar-link>
                    </li>
                    {{-- <li class="ccjr6 vme7x">
            <x-sidebar-link href="{{route('configuracion.tipousuarios.index')}}" :active="request()->routeIs('configuracion.tipousuarios.index')">
                <i class="fa-duotone fa-screen-users fa-lg mt-0.5"></i> Tipo de usuarios
            </x-sidebar-link>
        </li> --}}
                    <!-- End Link -->
                    <li
                        class="dqn44 klmzs pc1v2 vme7x dtwk2 qqcco y0zlk kj8vc dark:border-neutral-700 dark:first:border-transparent">
                        <span class="block dinuv p9x45 k9fz5 dark:text-neutral-500">
                            SEGURIDAD
                        </span>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('seguridad.usuarios.index') }}" :active="request()->routeIs('seguridad.usuarios.index')">
                            <i class="fa-duotone fa-users-gear fa-lg mt-0.5"></i> Usuarios
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('seguridad.roles.index') }}" :active="request()->routeIs('seguridad.roles.index')">
                            <i class="fa-duotone fa-code-branch fa-lg mt-0.5"></i> Roles y Permisos
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('seguridad.logs.index') }}" :active="request()->routeIs('seguridad.logs.index')">
                            <i class="fa-duotone fa-ballot-check fa-lg mt-0.5"></i> Bitacora
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('seguridad.logins.index') }}" :active="request()->routeIs('seguridad.logins.index')">
                            <i class="fa-duotone fa-ballot-check fa-lg mt-0.5"></i> Sesiones
                        </x-sidebar-link>
                    </li>
                    <li class="ccjr6 vme7x">
                        <x-sidebar-link href="{{ route('seguridad.respaldos.index') }}" :active="request()->routeIs('seguridad.respaldos.index')">
                            <i class="fa-duotone fa-database fa-lg mt-0.5"></i> Respaldos
                        </x-sidebar-link>
                    </li>
                </ul>
            </nav>
            <!-- End Nav -->
        </div>
        <!-- End Content -->

        <footer class="hidden nci9t dtwk2 qqcco dark:border-neutral-700">
            <!-- Project Dropdown -->
            <div class="qiq4i ">
                <div class="hs-dropdown [--auto-close:inside] relative flex">
                    <!-- Project Button -->
                    <button id="hs-pro-dnwpd" type="button"
                        class="group nt0di rbzts items-center ktbj6 xfjzu r0qgj r5iv1 mtw7z zyzsr v2n9r dark:text-white">

                        <svg class="hqihs h10nz xht9g" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7 15 5 5 5-5"></path>
                            <path d="m7 9 5-5 5 5"></path>
                        </svg>
                    </button>
                    <!-- End Project Button -->

                    <!-- Dropdown -->
                    <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 zxm8h transition-[opacity,margin] duration opacity-0 hidden xym5l i46tf blcqk shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900"
                        aria-labelledby="hs-pro-dnwpd">

                        <div class="f5f1g dtwk2 qqcco dark:border-neutral-800">
                            <button type="button"
                                class="nt0di flex items-center c8wa5 s4i34 ad9n0 wshph iuc27 r0qgj mqy9e mtw7z v2n9r sgu1p dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                {{ __('Sign out') }}
                                <span class="xht9g dinuv k9fz5 dark:text-neutral-500">
                                    {{ Auth::user()->email }}
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
            <!-- End Project Dropdown -->
        </footer>

        <div class="nyflq absolute dhdn2 -end-3 xym5l">
            <!-- Sidebar Close -->
            <button type="button"
                class="jzlk3 n6f3d rbzts ib4rh items-center ksdrw iuc27 ylb8r iunyp iz5hh qqcco i46tf k9fz5 it7ci v2n9r sgu1p mtw7z zyzsr dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                data-hs-overlay="#hs-pro-sidebar" aria-controls="hs-pro-sidebar" aria-label="Toggle navigation">
                <svg class="hqihs eg7eo" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="7 8 3 12 7 16"></polyline>
                    <line x1="21" x2="11" y1="12" y2="12"></line>
                    <line x1="21" x2="11" y1="6" y2="6"></line>
                    <line x1="21" x2="11" y1="18" y2="18"></line>
                </svg>
            </button>
            <!-- End Sidebar Close -->
        </div>
    </div>
</aside>
<!-- ========== END MAIN SIDEBAR ========== -->
