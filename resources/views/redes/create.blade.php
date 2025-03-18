<x-app-layout>
    <x-back-button />

    <x-form class="mx-auto" action="{{ route('redes.store') }}" method="post" buttonText="Agregar" titleForm="Agregar red"
        cancel="redes.index">
        <x-error-forms />

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre de red" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione un líder" />

            <x-select-input name="lider_de_red_id">
                <option selected disabled>Seleccione líder de red</option>
                @foreach ($personasNoLideresDeRed as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                @endforeach
            </x-select-input>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione un sub líder de red" />

            <x-select-input name="lider_de_red_2_id">
                <option selected disabled>Seleccione líder de red 2</option>
                @foreach ($personasNoLideresDeRed as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                @endforeach
            </x-select-input>
        </div>
    </x-form>
</x-app-layout>
