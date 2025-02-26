<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('categorias.update', $categoria->id) }}" method="PUT" buttonText="Actualizar"
        titleForm="Editar Categoría" :categoria="$categoria">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre"
                value="{{ old('nombre', $categoria->nombre) }}" required autofocus />
        </div>
    </x-form>
</x-app-layout>
