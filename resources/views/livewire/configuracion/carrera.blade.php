<div>
    <x-contenedor>
        <div
            class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Carreras
                </h2>
                <p class="text-sm text-gray-600">
                    Agregar carreras, editar y más.
                </p>
            </div>
            <div>
                <x-input type="text" wire:model.live="search" />
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <x-my-button class="bg-gray-800" wire:click="$set('openCreate', true)">
                        <i class="fa-duotone fa-id-card"></i> Agregar
                    </x-my-button>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        @if ($carreras->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('nombre')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Nombre
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'nombre')
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
                                    F. de Registro
                                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-end"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($carreras as $carrera)
                        <tr>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm text-gray-500">{{ $carrera->nombre }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="text-sm text-gray-500">{{ $carrera->created_at->toFormattedDateString() }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="flex">

                                    <a wire:click="edit({{ $carrera->id }})" class="cursor-pointer bg-gray-100 items-center py-2 px-2 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 mr-2">
                                        <i class="fa-duotone fa-pen-to-square"></i>
                                    </a>
                                    <a wire:click="confirmDeleteCarrera({{ $carrera->id }})" class=" items-center py-2 px-2 bg-gray-100 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                        <i class="fa-duotone fa-trash-can-plus"></i>

                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-2 px-4 float-right">
                <span class="pagination">
                    {{ $carreras->links('vendor.livewire.simple-tailwind') }}

                </span>
            </div>
        @else
            <div class="px-6 py-4 text-center text-sm text-gray-500">
                 No existe ninguna coincidencia con tu busqueda: <span class="font-bold">{{ $search }}</span>
            </div>
        @endif
    </x-contenedor>

    <form autocomplete="off" wire:submit="save">
        <x-dialog-modal wire:model="openCreate">
            <x-slot name="title">
                Registrar nuevo tipo de documento
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-2 grid-rows-1 gap-4">
                    <div>
                        <x-label for="nombre" class="text-sm" value="{{ __('Name') }}" />
                        <x-input id="nombre" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="nombre" />
                        <x-input-error for="nombre" class="mt-1" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('openCreate', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>

    <form autocomplete="off" wire:submit="update">
        <x-dialog-modal wire:model="openEdit">
            <x-slot name="title">
                Editar tipo de documento
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-2 grid-rows-1 gap-4">
                    <div>
                        <x-label for="nombre" class="text-sm" value="{{ __('Name') }}" />
                        <x-input id="nombre" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="nombre" />
                        <x-input-error for="nombre" class="mt-1" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('openEdit', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>

    <x-dialog-modal wire:model="confirmCarreraDeletion">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user? Please enter your password to confirm.') }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                    x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteCarrera" />

                <x-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmCarreraDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteCarrera" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
