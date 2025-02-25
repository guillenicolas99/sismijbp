<x-app-layout>
    <x-card-form>
        <form class="mx-auto" action="{{ route('redes.store') }}" method="post">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre de red" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Seleccione un líder" />

                <select name="is_active"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione líder de red</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <x-primary-button>
                Crear
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
