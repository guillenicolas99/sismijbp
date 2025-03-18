<x-app-layout>
    <x-form action="{{ route('evangelismos.store') }}" method="post" buttonText="Agregar"
        titleForm="Agregar - Departamento de Evangelismo y Afirmación" cancel="evangelismos.index">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombres y apellidos" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Edad" />
                <x-text-input class="block mt-1 w-full" type="number" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />
                <x-select-input name="genero">
                    <option selected disabled>Seleccione el género</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Aceptó/reconcilió" />
                <x-select-input name="genero">
                    <option selected disabled>Seleccione</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Ninguno</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Reconcilio</option>
                    <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Aceptación</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Dirección" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Correo" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
        </div>
    </x-form>
</x-app-layout>
