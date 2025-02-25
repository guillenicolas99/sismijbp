<x-app-layout>
    <x-card-form>
        <form class="mx-auto" action="{{ route('categorias.store') }}" method="post">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre de categoría" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus />
            </div>
            <x-primary-button>
                Crear
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
