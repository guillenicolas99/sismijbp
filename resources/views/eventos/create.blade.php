<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('eventos.store') }}" method="post" buttonText="Crear" titleForm="agregar evento"
        cancel="eventos.index">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre del evento" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"  autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Agregar imagen" />
            <x-text-input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image_path" :value="old('image_path')" 
                autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione una fecha" />
            <x-text-input class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" 
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
    </x-form>
</x-app-layout>
