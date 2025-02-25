<x-app-layout>

    <x-card-form>

        <x-title-form>EDITAR EVENTO</x-title-form>

        <form class="mx-auto" method="POST" action="{{ route('eventos.update', $evento) }}">
            @csrf
            @method('PUT')

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre del evento" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre"
                    value="{{ old('nombre', $evento->nombre) }}" required autofocus />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Seleccione una fecha" />
                <x-text-input class="block mt-1 w-full" type="date" name="fecha"
                    value="{{ old('fecha', $evento->fecha->format('Y-m-d')) }}" required autofocus />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Estado del evento" />
                <select name="is_active"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled>Seleccione el estado</option>
                    <option value="0" {{ $evento->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
                    <option value="1" {{ $evento->is_active == 1 ? 'selected' : '' }}>Activo</option>
                </select>
            </div>

            <x-primary-button>
                Actualizar
            </x-primary-button>
        </form>

    </x-card-form>
</x-app-layout>
