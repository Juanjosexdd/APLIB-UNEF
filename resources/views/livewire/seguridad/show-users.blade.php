<div>

    <x-contenedor>
        <div
            class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Usuarios
                </h2>
                <p class="text-sm text-gray-600">
                    Agregar usuarios, editar y más.
                </p>
            </div>
            <div>
                <x-input type="text" wire:model.live="search" />
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <x-my-button class="bg-gray-800" wire:click="$set('openCreate', true)">
                        <i class="fa-duotone fa-user-plus"></i> Agregar usuario
                    </x-my-button>
                </div>
            </div>
        </div>
        @if ($users->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('name')">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Nombre
                                    @if ($sort == 'name')
                                        @if ($direction == 'asc')
                                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                    Contacto
                                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                    Estatus
                                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                    Tipo de usuario
                                </span>
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
                    @foreach ($users as $user)
                        <tr>
                            <td class="whitespace-nowrap mr-2 pr-2">
                                <!-- User -->
                                <div class="hs-tooltip [--trigger:hover] sm:[--placement:right] inline-block">
                                    <div class="hs-tooltip-toggle max-w-xs p-3 flex items-center gap-x-3 ">
                                        <img class="inline-block size-[38px] rounded-full"
                                            src="{{ $user->profile_photo_url }}" alt="Image Description">

                                        <div class="grow">
                                            <span
                                                class="block text-sm font-semibold text-gray-500">{{ $user->document_type->abbreviation }}-{{ $user->identification_card }}</span>
                                            <span class="block text-sm text-gray-500">{{ $user->name }}
                                                {{ $user->lastname }}</span>
                                        </div>

                                        <!-- Popover Content -->
                                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible hidden opacity-0 transition-opacity absolute invisible z-10 max-w-xs w-full bg-white border border-gray-100 text-start rounded-xl shadow-md after:absolute after:top-0 after:-start-4 after:w-4 after:h-full"
                                            role="tooltip">
                                            <!-- Header -->
                                            <div class="py-3 px-4 border-b border-gray-200">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="flex-shrink-0 inline-block size-10 rounded-full ring-2 ring-white"
                                                        src="{{ $user->profile_photo_url }}">
                                                    <div class="grow">
                                                        <h4 class="font-semibold text-gray-800">
                                                            {{ $user->name }}
                                                            @if ($user->status_id == 1)
                                                                <span
                                                                    class="inline-flex items-center gap-x-1 py-1 px-3 rounded-lg text-sm font-medium bg-green-100 text-green-800">
                                                                    <i
                                                                        class="fa-duotone fa-badge-check fa-beat-fade"></i>
                                                                    Activo
                                                                </span>
                                                            @elseif($user->status_id == 2)
                                                                <span
                                                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-sm font-medium bg-red-100 text-red-800">
                                                                    <i
                                                                        class="fa-duotone fa-circle-xmark fa-beat-fade"></i>
                                                                    Inactivo
                                                                </span>
                                                            @endif
                                                        </h4>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $user->type_user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Header -->

                                            <!-- List -->
                                            <ul class="py-3 px-4 space-y-1">
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-address-card"></i>
                                                        {{ $user->document_type->abbreviation }} -
                                                        {{ $user->identification_card }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-circle-user"></i>
                                                        {{ $user->username }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-cake-candles"></i>
                                                        {{ $user->birthdate }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-map-location-dot"></i>
                                                        {{ $user->address }}
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-phone-volume"></i>
                                                        {{ $user->phone }}
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-envelope"></i>
                                                        {{ $user->email }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-calendar-plus"></i>
                                                        {{ $user->created_at->toFormattedDateString() }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800">
                                                        <i class="fa-duotone fa-calendar-lines-pen"></i>
                                                        {{ $user->updated_at->toFormattedDateString() }}
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- End List -->

                                            <!-- Footer -->
                                            <div class="py-2 px-4 flex justify-between items-center bg-gray-100">
                                                <a class="inline-flex items-center gap-x-1.5 text-xs text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
                                                    href="#">
                                                    <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path
                                                            d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z">
                                                        </path>
                                                        <line x1="4" x2="4" y1="22"
                                                            y2="15"></line>
                                                    </svg>
                                                    Flag
                                                </a>

                                                <button type="button"
                                                    class="py-1.5 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                    Follow
                                                </button>
                                            </div>
                                            <!-- End Footer -->
                                        </div>
                                        <!-- End Popover Content -->
                                    </div>
                                </div>
                                <!-- End User -->

                                {{-- <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3">
                                                    <div class="flex items-center gap-x-3 pl-4">
                                                        <img class="inline-block size-[38px] rounded-full"
                                                            src="{{ $user->profile_photo_url }}" alt="Image Description">
                                                        <div class="grow">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-500">{{ $user->document_type->abbreviation }}-{{ $user->identification_card }}</span>
                                                            <span class="block text-sm text-gray-500">{{ $user->name }}
                                                                {{ $user->lastname }}</span>
                                                        </div>
                                                    </div>
                                                </div> --}}
                            </td>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm font-semibold text-gray-500">{{ $user->phone }}</span>
                                    <span class="block text-sm text-gray-500">{{ $user->email }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    @if ($user->status_id == 1)
                                        <span
                                            class="inline-flex items-center gap-x-1 py-1 px-3 rounded-lg text-sm font-medium bg-green-100 text-green-800">
                                            <i class="fa-duotone fa-badge-check fa-beat-fade"></i>
                                            Activo
                                        </span>
                                        <x-tooltips>
                                            El usuario <span class="underline">tiene</span> acceso al
                                            sistema
                                        </x-tooltips>
                                    @elseif($user->status_id == 2)
                                        <span
                                            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-sm font-medium bg-red-100 text-red-800">
                                            <i class="fa-duotone fa-circle-xmark fa-beat-fade"></i>
                                            Inactivo
                                        </span>
                                        <x-tooltips>
                                            El usuario <span class="underline">no tiene</span> acceso
                                            al
                                            sistema
                                        </x-tooltips>
                                    @endif

                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm text-gray-500">{{ $user->type_user->name }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span
                                        class="text-sm text-gray-500">{{ $user->created_at->toFormattedDateString() }}</span>

                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                        <button id="hs-table-dropdown-1" type="button"
                                            class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="19" cy="12" r="1" />
                                                <circle cx="5" cy="12" r="1" />
                                            </svg>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 "
                                            aria-labelledby="hs-table-dropdown-1">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 ">
                                                    Actions
                                                </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                    href="#">
                                                    <i class="fa-duotone fa-eye"></i> Ver
                                                </a>
                                                <a class="cursor-pointer flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                    wire:click="edit({{ $user->id }})">
                                                    <i class="fa-duotone fa-pen-to-square"></i> Editar
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                    href="#">
                                                    <i class="fa-duotone fa-lock-keyhole"></i> Bloquear
                                                </a>
                                            </div>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <a wire:click="confirmDeleteUser({{ $user->id }})"
                                                    class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                                    <i class="fa-duotone fa-trash-can-plus"></i>
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-2 px-4 float-right">
                <span class="pagination">
                    {{ $users->links('vendor.livewire.simple-tailwind') }}

                </span>
            </div>
        @else
            <div class="px-6 py-4 text-center text-sm text-gray-500">
                {{ $search }} No existe ninguna coincidencia
            </div>
        @endif
    </x-contenedor>

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user? Please enter your password to confirm.') }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                    x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser" />

                <x-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>


    <form autocomplete="off" wire:submit="save">
        <x-dialog-modal wire:model="openCreate">
            <x-slot name="title">
                Registrar nuevo usuario
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-3 grid-rows-5 gap-1">
                    <div class="row-span-2">
                        <div class="flex items-center gap-5">
                            <img class="inline-block size-full rounded-full ring-2 ring-white"
                                src="{{ asset('img/img1.jpg') }}" alt="Image Description">
                            <div class="flex gap-x-2">
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-label for="name" class="text-sm" value="{{ __('Name') }}(s)" />
                        <x-input id="name" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="name" />
                        <x-input-error for="name" class="mt-1 {{ $errors->has('name') ? 'block' : 'hidden' }}" />
                    </div>
                    <div>
                        <x-label for="lastname" value="{{ __('Apellidos') }}(s)" />
                        <x-input id="lastname" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="lastname" />
                        <x-input-error for="lastname"
                            class="mt-1 {{ $errors->has('lastname') ? 'block' : 'hidden' }}" />
                    </div>
                    <div class="col-start-2 row-start-2">
                        <x-label for="document_type_id" class="text-sm" value="{{ __('Tipo de documento') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="document_type_id">
                                <option>Seleccione una opción</option>
                                @foreach ($document_types as $document_type)
                                    <option value="{{ $document_type->id }}">({{ $document_type->abbreviation }})
                                        {{ $document_type->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="document_type_id" class="mt-2" />
                    </div>
                    <div class="col-start-3 row-start-2">
                        <x-label for="identification_card" class="text-sm" value="{{ __('Nro. Documento') }}" />
                        <x-input id="identification_card" type="number" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="identification_card" />
                        <x-input-error for="identification_card" class="mt-1 text-xs" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="sex" class="text-sm" value="{{ __('Genero') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="sex">
                                <option>Seleccione una opción</option>
                                <option value="0">Hombre</option>
                                <option value="1">Mujer</option>
                            </x-select>
                        </div>
                        <x-input-error for="sex" class="mt-2" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="birthdate" value="{{ __('F. Nacimiento') }}" />
                        <x-input id="birthdate" type="date" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="birthdate" />
                        <x-input-error for="birthdate" class="mt-2" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="phone" class="text-sm" value="{{ __('Telefono') }}" />
                        <x-input id="phone" type="number" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="phone" />
                        <x-input-error for="phone" class="mt-1 text-xs" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="email" value="{{ __('email') }}" />
                        <x-input id="email" type="email" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="email" />
                        <x-input-error for="email" class="mt-2" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="status_id" class="text-sm" value="{{ __('Estatus') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="status_id">
                                <option>Seleccione una opción</option>
                                @foreach ($status as $statu)
                                    <option value="{{ $statu->id }}">{{ $statu->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="status_id" class="mt-2" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="type_user_id" class="text-sm" value="{{ __('Tipo de usuario') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="type_user_id">
                                <option>Seleccione una opción</option>
                                @foreach ($type_users as $type_user)
                                    <option value="{{ $type_user->id }}">{{ $type_user->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="type_user_id" class="mt-2" />
                    </div>
                    <div class="col-span-3 row-start-5">
                        <x-label for="address" class="text-sm" value="{{ __('address') }}(s)" />
                        <x-input type="text" wire:model.live="address" class="!py-1 !px-1.5 mt-1 block w-full" />
                        <x-input-error for="address" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="username" class="text-sm" value="{{ __('username') }}(s)" />
                        <x-input id="username" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="username" />
                        <x-input-error for="username" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password" class="text-sm" value="{{ __('Password') }}(s)" />
                        <x-input id="password" type="password" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="password" />
                        <x-input-error for="password" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" type="password" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="password_confirmation" />
                        <x-input-error for="password_confirmation" class="mt-2" />
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
        <x-dialog-modal wire:model="openUpdate">
            <x-slot name="title">
                Registrar nuevo usuario
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-3 grid-rows-5 gap-4">
                    <div class="row-span-2"></div>
                    <div>
                        <x-label for="name" class="text-sm" value="{{ __('Name') }}(s)" />
                        <x-input id="name" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="name" />
                        <x-input-error for="name" class="mt-2 {{ $errors->has('name') ? 'block' : 'hidden' }}" />
                    </div>
                    <div>
                        <x-label for="lastname" value="{{ __('Apellidos') }}(s)" />
                        <x-input id="lastname" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="lastname" />
                        <x-input-error for="lastname"
                            class="mt-2 {{ $errors->has('lastname') ? 'block' : 'hidden' }}" />
                    </div>
                    <div class="col-start-2 row-start-2">
                        <x-label for="document_type_id" class="text-sm" value="{{ __('Tipo de documento') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="document_type_id">
                                <option disabled>Seleccione una opción</option>
                                @foreach ($document_types as $document_type)
                                    <option value="{{ $document_type->id }}">({{ $document_type->abbreviation }})
                                        {{ $document_type->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="document_type_id" class="mt-2" />
                    </div>
                    <div class="col-start-3 row-start-2">
                        <x-label for="identification_card" class="text-sm" value="{{ __('Nro. Documento') }}" />
                        <x-input id="identification_card" type="number" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="identification_card" />
                        <x-input-error for="identification_card" class="mt-1 text-xs" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="sex" class="text-sm" value="{{ __('Genero') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="sex">
                                <option disabled>Seleccione una opción</option>
                                <option value="0">Hombre</option>
                                <option value="1">Mujer</option>
                            </x-select>
                        </div>
                        <x-input-error for="sex" class="mt-2" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="birthdate" value="{{ __('F. Nacimiento') }}" />
                        <x-input id="birthdate" type="date" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="birthdate" />
                        <x-input-error for="birthdate" class="mt-2" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="phone" class="text-sm" value="{{ __('Telefono') }}" />
                        <x-input id="phone" type="number" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="phone" />
                        <x-input-error for="phone" class="mt-1 text-xs" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="email" value="{{ __('email') }}" />
                        <x-input id="email" type="email" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="email" />
                        <x-input-error for="email" class="mt-2" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="status_id" class="text-sm" value="{{ __('Estatus') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="status_id">
                                <option disabled>Seleccione una opción</option>
                                @foreach ($status as $statu)
                                    <option value="{{ $statu->id }}">{{ $statu->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="status_id" class="mt-2" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="type_user_id" class="text-sm" value="{{ __('Tipo de usuario') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="type_user_id">
                                <option disabled>Seleccione una opción</option>
                                @foreach ($type_users as $type_user)
                                    <option value="{{ $type_user->id }}">{{ $type_user->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="type_user_id" class="mt-2" />
                    </div>
                    <div class="col-span-3 row-start-5">
                        <x-label for="address" class="text-sm" value="{{ __('address') }}(s)" />
                        <x-input type="text" wire:model.live="address" class="!py-1 !px-1.5 mt-1 block w-full" />
                        <x-input-error for="address" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="username" class="text-sm" value="{{ __('username') }}(s)" />
                        <x-input id="username" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="username" />
                        <x-input-error for="username" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password" class="text-sm" value="{{ __('Password') }}(s)" />
                        <x-input id="password" type="password" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="password" />
                        <x-input-error for="password" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" type="password" class="!py-1 !px-1.5 mt-1 block w-full"
                            wire:model.live="password_confirmation" />
                        <x-input-error for="password_confirmation" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('openUpdate', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
