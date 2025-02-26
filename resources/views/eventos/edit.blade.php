<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('eventos.update', $evento) }}" method="put" buttonText="Actualizar"
        titleForm="EDITAR EVENTO">
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
            <x-select-input name="is_active">
                <option disabled>Seleccione el estado</option>
                <option value="0" {{ $evento->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
                <option value="1" {{ $evento->is_active == 1 ? 'selected' : '' }}>Activo</option>
            </x-select-input>
        </div>
    </x-form>
</x-app-layout>
