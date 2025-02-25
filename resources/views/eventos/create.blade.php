<x-app-layout>

    <x-card-form>
        <x-title-form>CREAR EVENTO</x-title-form>

        <form class="mx-auto" method="POST" action="{{ route('eventos.store') }}">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre del evento" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Seleccione una fecha" />
                <x-text-input class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Estado del evento" />

                <select name="is_active"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione el estado</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <x-primary-button>
                Crear
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
