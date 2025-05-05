<x-app-layout>
    <x-form action="{{ route('evangelismos.store') }}" method="post" buttonText="Agregar"
        titleForm="Agregar - Departamento de Evangelismo y Afirmación" cancel="evangelismos.index">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre del evento" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Mes de seguimiento" />
            <x-text-input class="block mt-1 w-full" type="date" name="mes" :value="old('mes')" autofocus />
        </div>
    </x-form>
</x-app-layout>
