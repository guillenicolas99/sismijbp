<x-app-layout>
    <x-form action="{{ route('personas.update', $persona) }}" method="put" buttonText="Actualizar" titleForm="Editar"
        cancel="personas.index">

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre"
                value="{{ old('nombre', $persona->nombre) }}" autofocus />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />

                <select name="genero"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled>Seleccione el género</option>
                    <option value="M" {{ $persona->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $persona->genero == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono"
                    value="{{ old('telefono', $persona->telefono) }}" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Cédula" />
                <x-text-input class="block mt-1 w-full" type="text" name="cedula"
                    value="{{ old('cedula', $persona->cedula) }}" autofocus />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-is-active model="{{ $persona->is_active }}" />
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Red" />

                <x-select-input name="red_id">
                    <option value="">Seleccione una red</option>
                    <option value="">Sin Red</option>
                    @foreach ($redes as $red)
                        <option value="{{ $red->id }}"
                            {{ old('red_id', $persona->red_id) == $red->id ? 'selected' : '' }}>
                            {{ $red->nombre }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nivel de liderazgo" />

                <x-select-input name="titulo_id">
                    <option value="">Seleccione un título</option>
                    @foreach ($titulos as $titulo)
                        <option value="{{ $titulo->id }}"
                            {{ old('titulo_id', $persona->titulo_id) == $titulo->id ? 'selected' : '' }}>
                            {{ $titulo->nombre }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Bautizado" />
                <x-select-input name="is_baptized">
                    <option value="" disabled>Seleccione</option>
                    <option value="0" {{ old('is_baptized', $persona->is_baptized) == 0 ? 'selected' : '' }}>
                        No
                    </option>
                    <option value="1" {{ old('is_baptized', $persona->is_baptized) == 1 ? 'selected' : '' }}>Si
                    </option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Estado civil" />
                <x-select-input name="is_single">
                    <option value="">Seleccione</option>
                    <option value="0" {{ old('is_single', $persona->is_single) == 0 ? 'selected' : '' }}>casado
                    </option>
                    <option value="1" {{ old('is_single', $persona->is_single) == 1 ? 'selected' : '' }}>soltero
                    </option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Discipulado que pertenece" />

                <x-select-input name="discipulado_id">
                    <option value="">Seleccione mentores</option>
                    @foreach ($discipulados as $discipulado)
                        <option value="{{ $discipulado->id }}"
                            {{ $discipulado->id == $persona->discipulado_id ? 'selected' : '' }}>
                            {{ $discipulado->mentor_1 }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

    </x-form>
</x-app-layout>
