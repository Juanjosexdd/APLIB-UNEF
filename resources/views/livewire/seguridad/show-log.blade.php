<div>
    <div>
        <div>
            <x-contenedor>
                <div
                    class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Registros
                        </h2>
                        <p class="text-sm text-gray-600">
                            Historial de registros de usuarios dentro del sisstema sistema.
                        </p>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                @if ($logsistemas->count())
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
                                    wire:click="order('tx_descripcion')">
                                    <div class="flex items-center gap-x-2 justify-between">
                                        <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                            Descripción
                                        </span>
                                        <div class="text-xs font-semibold">
                                            @if ($sort == 'tx_descripcion')
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
                                            F. de ingreso
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($logsistemas as $log)
                                <tr>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-500">{{ $log->user->username }}</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-500">{{ $log->tx_descripcion }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500">{{ $log->created_at }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-2 px-4 float-right">
                        <span class="pagination">
                            {{ $logsistemas->links('vendor.livewire.simple-tailwind') }}
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

</div>
