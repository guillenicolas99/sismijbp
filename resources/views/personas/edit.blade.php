<x-app-layout>
    <x-form action="{{ route('personas.update', $persona) }}" method="put" buttonText="Actualizar" titleForm="Editar"
        cancel="personas.index">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative z-0 w-full mb-5 group">
                {{-- Nombres --}}
                <x-input-label value="Nombres" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombres"
                    value="{{ old('nombres', $persona->nombres) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Apellidos --}}
                <x-input-label value="Apellidos" />
                <x-text-input class="block mt-1 w-full" type="text" name="apellidos"
                    value="{{ old('apellidos', $persona->apellidos) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Dirección" />
                <x-text-input class="block mt-1 w-full" type="text" name="direccion"
                    value="{{ old('direccion', $persona->direccion) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Departamento --}}
                <x-input-label value="Departamento" />
                <x-text-input class="block mt-1 w-full" type="text" name="departamento"
                    value="{{ old('departamento', $persona->departamento) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Fecha de nacimiento --}}
                <x-input-label value="Fecha de nacimiento" />
                <x-text-input class="block mt-1 w-full" type="date" name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Género --}}
                <x-input-label value="Género" />
                <x-select-input name="genero">
                    <option disabled>Seleccione el género</option>
                    <option value="M" {{ old('genero', $persona->genero) == 'M' ? 'selected' : '' }}>Masculino
                    </option>
                    <option value="F" {{ old('genero', $persona->genero) == 'F' ? 'selected' : '' }}>Femenino
                    </option>
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Teléfono --}}
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono"
                    value="{{ old('telefono', $persona->telefono) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Telefonía --}}
                <x-input-label value="Telefonía" />
                <x-select-input name="telefonia_id">
                    <option disabled>Seleccione telefonía</option>
                    @foreach ($telefonias as $telefonia)
                        <option value="{{ $telefonia->id }}"
                            {{ old('telefonia_id', $persona->telefonia_id) == $telefonia->id ? 'selected' : '' }}>
                            {{ $telefonia->nombre }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Correo --}}
                <x-input-label value="Correo" />
                <x-text-input class="block mt-1 w-full" type="email" name="correo"
                    value="{{ old('correo', $persona->correo) }}" required />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Cédula --}}
                <x-input-label value="Cédula" />
                <x-text-input class="block mt-1 w-full" type="text" name="cedula"
                    value="{{ old('cedula', $persona->cedula) }}" />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Bautizado --}}
                <x-input-label value="¿Bautizado?" />
                <x-select-input name="is_baptized">
                    <option disabled>Seleccione</option>
                    <option value="1" {{ old('is_baptized', $persona->is_baptized) == 1 ? 'selected' : '' }}>Sí
                    </option>
                    <option value="0" {{ old('is_baptized', $persona->is_baptized) == 0 ? 'selected' : '' }}>No
                    </option>
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Estado civil --}}
                <x-input-label value="Estado Civil" />
                <x-select-input name="is_single">
                    <option disabled>Seleccione</option>
                    <option value="1" {{ old('is_single', $persona->is_single) == 1 ? 'selected' : '' }}>Soltero
                    </option>
                    <option value="0" {{ old('is_single', $persona->is_single) == 0 ? 'selected' : '' }}>Casado
                    </option>
                </x-select-input>

            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Red --}}
                <x-input-label value="Red" />
                <x-select-input name="red_id">
                    <option value="">Sin red</option>
                    @foreach ($redes as $red)
                        <option value="{{ $red->id }}"
                            {{ old('red_id', $persona->red_id) == $red->id ? 'selected' : '' }}>
                            {{ $red->nombre }}
                        </option>
                    @endforeach
                </x-select-input>

            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Título --}}
                <x-input-label value="Título" />
                <x-select-input name="titulo_id">
                    <option value="">Sin título</option>
                    @foreach ($titulos as $titulo)
                        <option value="{{ $titulo->id }}"
                            {{ old('titulo_id', $persona->titulo_id) == $titulo->id ? 'selected' : '' }}>
                            {{ $titulo->nombre }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                {{-- Discipulado --}}
                <x-input-label value="Discipulado que pertenece" />
                <x-select-input name="discipulado_id">
                    <option value="">Sin mentores</option>
                    @foreach ($discipulados as $discipulado)
                        <option value="{{ $discipulado->id }}"
                            {{ old('discipulado_id', $persona->discipulado_id) == $discipulado->id ? 'selected' : '' }}>
                            {{ $discipulado->mentor_1 }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

    </x-form>
</x-app-layout>
