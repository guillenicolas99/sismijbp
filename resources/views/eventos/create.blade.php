<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('eventos.store') }}" method="post" buttonText="Crear" titleForm="agregar evento"
        cancel="eventos.index">
        <div class="">
            <p class="text-sm text-gray-500">Agrega los detalles del evento.</p>
            <hr class="my-4 border-gray-300" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div class="relative z-0 w-full group">
                <x-input-label value="Nombre del evento" />
                <x-text-input class="block w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full group">
                <x-input-label value="Agregar imagen" />
                <x-text-input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    type="file" name="image_path" :value="old('image_path')" autofocus />
            </div>
            <div class="relative z-0 w-full group">
                <x-input-label value="Fecha del evento" />
                <x-text-input class="block w-full" type="date" name="fecha" :value="old('fecha')" autofocus />
            </div>
        </div>

        {{-- DIVISIÓN EVENTO CON TICKETS --}}
        <div class="">
            <hr class="my-4 border-gray-300" />
            <h2 class="text-2xl font-bold text-white">Tickets</h2>
            <p class="text-sm text-gray-500">Agrega los tickets que tendrá el evento.</p>
            <hr class="my-4 border-gray-300" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4" id="ticket-container">
            {{-- TICKETS PREMIUM --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="relative z-0 w-full group">
                    <x-input-label value="Cantidad Premium" />
                    <x-text-input class="block w-full" type="number" name="cantidadPremium" :value="old('cantidadPremium')"
                        autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio Premium" />
                    <x-text-input class="block w-full" type="number" name="precioPremium" :value="old('precioPremium')"
                        autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio descuento Premium" />
                    <x-text-input class="block w-full" type="number" name="descuentoPremium" :value="old('descuentoPremium')"
                        autofocus />
                </div>
            </div>
            {{-- TICKETS VIP --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="relative z-0 w-full group">
                    <x-input-label value="Cantidad VIP" />
                    <x-text-input class="block w-full" type="number" name="cantidadVIP" :value="old('cantidadVIP')" autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio VIP" />
                    <x-text-input class="block w-full" type="number" name="precioVIP" :value="old('precioVIP')" autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio descuento VIP" />
                    <x-text-input class="block w-full" type="number" name="descuentoVIP" :value="old('descuentoVIP')" autofocus />
                </div>
            </div>
            {{-- TICKETS GENERAL --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="relative z-0 w-full group">
                    <x-input-label value="Cantidad General" />
                    <x-text-input class="block w-full" type="number" name="cantidadGeneral" :value="old('cantidadGeneral')"
                        autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio General" />
                    <x-text-input class="block w-full" type="number" name="precioGeneral" :value="old('precioGeneral')"
                        autofocus />
                </div>
                <div class="relative z-0 w-full group">
                    <x-input-label value="Precio descuento General" />
                    <x-text-input class="block w-full" type="number" name="descuentoGeneral" :value="old('descuentoGeneral')"
                        autofocus />
                </div>
            </div>
            {{-- FECHA LÍMITE DE DESCUENTO --}}
            <div class="relative z-0 w-full group">
                <x-input-label value="Fecha límite de descuento" />
                <x-text-input class="block w-full" type="date" name="fechaDescuento" :value="old('fechaDescuento')" autofocus />
            </div>
        </div>
    </x-form>

</x-app-layout>
