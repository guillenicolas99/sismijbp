<x-app-layout>

    <x-card-form>
        <x-title-form>EDITAR DISCÍPULO</x-title-form>

        <form class="mx-auto" method="POST" action="{{ route('personas.update', $persona) }}">
            @csrf
            @method('PUT')
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombre" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre"
                    value="{{ old('nombre', $persona->nombre) }}" required autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />

                <select name="genero"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione el género</option>
                    <option value="M" {{ $persona->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $persona->genero == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', $persona->telefono)" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Cédula" />
                <x-text-input class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula', $persona->cedula)" required
                    autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Estado" />

                <select name="is_active"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Seleccione estado</option>
                    <option value="0" {{ $persona->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
                    <option value="1" {{ $persona->is_active == 1 ? 'selected' : '' }}>Activo</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Red" />

                <select name="red_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Seleccione una red</option>
                    @foreach ($redes as $red)
                        <option value="{{ $red->id }}" {{ $red->id == $persona->red_id ? 'selected' : '' }}>
                            {{ $red->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nivel de liderazgo" />

                <select name="titulo_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Seleccione una título</option>
                    @foreach ($titulos as $titulo)
                        <option value="{{ $titulo->id }}"
                            {{ $titulo->id == $persona->titulo_id ? 'selected' : $persona->titulo_id }}>
                            {{ $titulo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <x-primary-button>
                Actualizar
            </x-primary-button>
        </form>
    </x-card-form>
</x-app-layout>
