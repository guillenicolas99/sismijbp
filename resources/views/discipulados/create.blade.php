<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('discipulados.store') }}" method="post" buttonText="Agregar" titleForm="Agregar discipulado"
        cancel="discipulados.index">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Seleccione un mentor" />

            <x-select-input name="mentor_1_id">
                <option selected disabled>Seleccione mentor 1</option>
                @foreach ($mentores as $mentor)
                    <option value="{{ $mentor->id }}" {{ old('mentor_1_id') == $mentor->nombre ? 'selected' : '' }}>
                        {{ $mentor->nombre }} ({{ $mentor->titulo?->nombre ?? 'sin título' }})
                    </option>
                @endforeach
            </x-select-input>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre de mentor 2" />

            <x-select-input name="mentor_2_id">
                <option selected disabled>Seleccione mentor 2</option>
                @foreach ($mentores as $mentora)
                    <option value="{{ $mentora->id }}" {{ old('mentor_2_id') == $mentora->nombre ? 'selected' : '' }}>
                        {{ $mentora->nombre }}
                    </option>
                @endforeach
            </x-select-input>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Red" />
            <x-select-input name="red_id">
                <option selected disabled>Seleccione la red</option>
                @foreach ($redes as $red)
                    <option value="{{ $red->id }}" {{ old('red_id') == $red->id ? 'selected' : '' }}>
                        {{ $red->nombre }}
                    </option>
                @endforeach
            </x-select-input>
        </div>

    </x-form>
</x-app-layout>
