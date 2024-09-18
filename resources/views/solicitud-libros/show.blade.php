<x-app-layout>
    <x-contenedor>
        <!-- Invoice -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
            <!-- Grid -->
            <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">Mi Solicitu #SOL-{{$missolicitude->id}}</h2>
                </div>
            </div>
            <!-- End Grid -->

            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-3">
                <div>
                    <div class="grid space-y-3">
                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Identificación:
                            </dt>
                            <dd class="font-medium text-gray-800 ">
                                <span
                                    class="block font-semibold">{{ $missolicitude->document_type->abbreviation . '  -' . $missolicitude->identification_card }}</span>
                            <dd class="not-italic font-normal text-gray-700">

                            </dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Solicitante:
                            </dt>
                            <dd class="text-gray-800 ">
                                <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                    href="{{ route('profile.show') }}">
                                    {{ $missolicitude->name . ' - ' . $missolicitude->lastname }}
                                </a>
                            </dd>
                        </dl>


                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Dirección:
                            </dt>
                            <dd class="font-medium text-gray-800 ">
                                <address class="not-italic font-normal">
                                    {{ $missolicitude->address }},<br>
                                </address>
                            </dd>
                        </dl>
                    </div>
                </div>
                <!-- Col -->

                <div>
                    <div class="grid space-y-3">
                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Solicitud Nro:
                            </dt>
                            <dd class="font-medium text-gray-800 ">
                                SOL-{{ $numeroSolicitud }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Tipo de Usuario:
                            </dt>
                            <dd class="text-gray-800 block font-semibold ">
                                {{$missolicitude->type_user->name }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                F. de Solicitud
                            </dt>
                            <dd class="font-medium text-gray-800 ">
                                SOL-{{ $missolicitude->id }}
                            </dd>
                        </dl>

                        {{-- <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                            <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                Billing method:
                            </dt>
                            <dd class="font-medium text-gray-800 ">
                                Send invoice
                            </dd>
                        </dl> --}}
                    </div>
                </div>

                <!-- Col -->
            </div>
            <!-- End Grid -->

            <!-- Table -->
            <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4">
                <div class="hidden sm:grid sm:grid-cols-5">
                    <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
                    <div class="text-start text-xs font-medium text-gray-500 uppercase">Qty</div>
                    <div class="text-start text-xs font-medium text-gray-500 uppercase">Rate</div>
                    <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                </div>

                <div class="hidden sm:block border-b border-gray-200"></div>

                <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    <div class="col-span-full sm:col-span-2">
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                        <p class="font-medium text-gray-800">Design UX and UI</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                        <p class="text-gray-800">1</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                        <p class="text-gray-800">5</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                        <p class="sm:text-end text-gray-800">$500</p>
                    </div>
                </div>

                <div class="sm:hidden border-b border-gray-200"></div>

                <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    <div class="col-span-full sm:col-span-2">
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                        <p class="font-medium text-gray-800">Web project</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                        <p class="text-gray-800">1</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                        <p class="text-gray-800">24</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                        <p class="sm:text-end text-gray-800">$1250</p>
                    </div>
                </div>

                <div class="sm:hidden border-b border-gray-200"></div>

                <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    <div class="col-span-full sm:col-span-2">
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                        <p class="font-medium text-gray-800">SEO</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                        <p class="text-gray-800">1</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                        <p class="text-gray-800">6</p>
                    </div>
                    <div>
                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                        <p class="sm:text-end text-gray-800">$2000</p>
                    </div>
                </div>
            </div>
            <!-- End Table -->

            <!-- Flex -->
            <div class="mt-8 flex sm:justify-end">
                <div class="w-full max-w-2xl sm:text-end space-y-2">
                    <!-- Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500">Subotal:</dt>
                            <dd class="col-span-2 font-medium text-gray-800">$2750.00</dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500">Total:</dt>
                            <dd class="col-span-2 font-medium text-gray-800">$2750.00</dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500">Tax:</dt>
                            <dd class="col-span-2 font-medium text-gray-800">$39.00</dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500">Amount paid:</dt>
                            <dd class="col-span-2 font-medium text-gray-800">$2789.00</dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500">Due balance:</dt>
                            <dd class="col-span-2 font-medium text-gray-800">$0.00</dd>
                        </dl>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Flex -->
        </div>
    </x-contenedor>
    <!-- End Invoice -->
</x-app-layout>
