<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('titulos.update', $titulo) }}" method="put" buttonText="Actualizar"
        titleForm="Editar cargo" cancel="titulos.index">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $titulo->nombre)" required autofocus />
        </div>
    </x-form>
</x-app-layout>
