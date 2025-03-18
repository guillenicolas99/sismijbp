<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('eventos.update', $evento) }}" method="put" buttonText="Actualizar" titleForm="EDITAR evento"
        cancel="eventos.index">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre del evento" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre"
                value="{{ old('nombre', $evento->nombre) }}" required autofocus />
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Agregar imagen" />
            <x-text-input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                type="file" name="image_path" :value="old('image_path', $evento->image_path)" autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione una fecha" />
            <x-text-input class="block mt-1 w-full" type="date" name="fecha"
                value="{{ old('fecha', $evento->fecha->format('Y-m-d')) }}" required autofocus />
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Estado del evento" />
            <x-select-input name="is_active">
                <option disabled>Seleccione el estado</option>
                <option value="0" {{ $evento->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
                <option value="1" {{ $evento->is_active == 1 ? 'selected' : '' }}>Activo</option>
            </x-select-input>
        </div>
    </x-form>
</x-app-layout>
