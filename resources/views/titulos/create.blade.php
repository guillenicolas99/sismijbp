<x-app-layout>
    <x-card-form>
        <x-title-form>Crear nivel de liderazgo</x-title-form>
        <form class="mx-auto" action="{{ route('titulos.store') }}" method="post">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus />
            </div>
            <x-primary-button>
                Crear
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
