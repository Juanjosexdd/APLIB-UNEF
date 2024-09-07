<div>
    <div>
        <x-contenedor>
            <div
                class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">
                        Sesiones
                    </h2>
                    <p class="text-sm text-gray-600">
                        Historial de acceso de usuarios al sistema.
                    </p>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            @if ($logs->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                                wire:click="order('user_id')">
                                <div class="flex items-center gap-x-2 justify-between">
                                    <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                        Usuario
                                    </span>
                                    <div class="text-xs font-semibold">
                                        @if ($sort == 'user_id')
                                            @if ($direction == 'asc')
                                                <i class="fa-duotone fa-arrow-up-a-z"></i>
                                            @else
                                                <i class="fa-duotone fa-arrow-down-z-a"></i>
                                            @endif
                                        @else
                                            <i class="fa-duotone fa-sort-up"></i>
                                        @endif
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                                wire:click="order('ip_address')">
                                <div class="flex items-center gap-x-2 justify-between">
                                    <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                        Dirección Ip
                                    </span>
                                    <div class="text-xs font-semibold">
                                        @if ($sort == 'ip_address')
                                            @if ($direction == 'asc')
                                                <i class="fa-duotone fa-arrow-up-a-z"></i>
                                            @else
                                                <i class="fa-duotone fa-arrow-down-z-a"></i>
                                            @endif
                                        @else
                                            <i class="fa-duotone fa-sort-up"></i>
                                        @endif
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                        Navegador
                                    </span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                        F. de ingreso
                                    </span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                        F. de salida
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-end"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($logs as $log)
                            <tr>
                                <td class="h-px w-72 whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="block text-sm text-gray-500">{{ $log->user->username }}</span>
                                    </div>
                                </td>
                                <td class="h-px w-72 whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="block text-sm text-gray-500">{{ $log->ip_address }}</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-3">

                                        <span
                                            class="text-sm text-gray-500">{{ Str::limit($log->user_agent, 40) }}</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500">{{ $log->login_at }}</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500">{{ $log->logout_at }}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-2 px-4 float-right">
                    <span class="pagination">
                        {{ $logs->links('vendor.livewire.simple-tailwind') }}

                    </span>
                </div>
            @else
                <div class="px-6 py-4 text-center text-sm text-gray-500">
                    No existe ninguna coincidencia con tu busqueda: <span class="font-bold">{{ $search }}</span>
                </div>
            @endif
        </x-contenedor>
    </div>

</div>
