<x-app-layout>

    <x-card-form>
        <x-title-form>NUEVO DISCÍPULO</x-title-form>

        <form class="mx-auto" method="POST" action="{{ route('personas.store') }}">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />

                <select name="genero"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione el género</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Cédula" />
                <x-text-input class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Red" />

                <select name="red_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione una red</option>
                    @foreach ($redes as $red)
                        <option value="{{ $red->id }}">{{ $red->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nivel de liderazgo" />

                <select name="titulo_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione una título</option>
                    @foreach ($titulos as $titulo)
                        <option value="{{ $titulo->id }}">{{ $titulo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <x-primary-button>
                Crear
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
