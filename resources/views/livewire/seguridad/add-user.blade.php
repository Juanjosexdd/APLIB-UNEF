<div>
    <x-my-button class="bg-gray-800" wire:click="$set('open', true)">
        <i class="fa-duotone fa-user-plus"></i> Agregar usuario
    </x-my-button>

    <form autocomplete="off" wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Registrar nuevo usuario
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-3 grid-rows-5 gap-4">
                    <div class="row-span-2"></div>
                    <div>
                        <x-label for="name" class="text-sm" value="{{ __('Name') }}(s)" />
                        <x-input id="name" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="name" />
                        <x-input-error for="name" class="mt-2 {{ $errors->has('name') ? 'block' : 'hidden' }}" />
                    </div>
                    <div>
                        <x-label for="lastname" value="{{ __('Apellidos') }}(s)" />
                        <x-input id="lastname" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="lastname" />
                        <x-input-error for="lastname" class="mt-2 {{ $errors->has('lastname') ? 'block' : 'hidden' }}" />
                    </div>
                    <div class="col-start-2 row-start-2">
                        <x-label for="document_type_id" class="text-sm" value="{{ __('Tipo de documento') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="document_type_id">
                                <option disabled>Seleccione una opción</option>
                                @foreach ($document_types as $document_type)
                                    <option value="{{ $document_type->id }}">({{ $document_type->abbreviation }}) {{ $document_type->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="document_type_id" class="mt-2" />
                    </div>
                    <div class="col-start-3 row-start-2">
                        <x-label for="identification_card" class="text-sm" value="{{ __('Nro. Documento') }}" />
                        <x-input id="identification_card" type="number" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="identification_card" />
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
                        <x-input id="birthdate" type="date" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="birthdate" />
                        <x-input-error for="birthdate" class="mt-2" />
                    </div>
                    <div class="row-start-3">
                        <x-label for="phone" class="text-sm" value="{{ __('Telefono') }}" />
                        <x-input id="phone" type="number" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="phone" />
                        <x-input-error for="phone" class="mt-1 text-xs" />
                    </div>
                    <div class="row-start-4">
                        <x-label for="email" value="{{ __('email') }}" />
                        <x-input id="email" type="email" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="email" />
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
                        <x-input id="username" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="username" />
                        <x-input-error for="username" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password" class="text-sm" value="{{ __('Password') }}(s)" />
                        <x-input id="password" type="password" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="password" />
                        <x-input-error for="password" class="mt-2" />
                    </div>
                    <div class="row-start-6">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" type="password" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="password_confirmation" />
                        <x-input-error for="password_confirmation" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
