<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('redes.update', $red->id) }}" method="PUT" buttonText="Actualizar"
        titleForm="Actualizar red">
        <x-error-forms />

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre de red" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $red->nombre) }}"
                required autofocus />
        </div>

        <x-is-active model="{{ $red->is_active }}" />

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione un líder" />

            <x-select-input name="lider_de_red">
                <option>Seleccione líder de red</option>
                @foreach ($personas as $persona)
                    <option value="{{ $persona->nombre }}"
                        {{ $persona->nombre == $red->lider_de_red ? 'selected' : '' }}>
                        {{ $persona->nombre }}</option>
                @endforeach
            </x-select-input>
        </div>
    </x-form>
</x-app-layout>
