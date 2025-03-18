<x-app-layout>
    <x-back-button />

    <x-form action="{{ route('discipulados.store') }}" method="post" buttonText="Agregar" titleForm="Agregar discipulado"
        cancel="discipulados.index">
        <x-select-input name="red_id" id="red_id">
            <option selected disabled>Seleccione la red</option>
            @foreach ($redes as $red)
                <option value="{{ $red->id }}">{{ $red->nombre }}</option>
            @endforeach
        </x-select-input>

        <x-select-input name="mentor_1_id" id="mentor_1_id">
            <option selected disabled>Seleccione mentor 1</option>
        </x-select-input>

        <x-select-input name="mentor_2_id" id="mentor_2_id">
            <option selected disabled>Seleccione mentor 2</option>
        </x-select-input>

    </x-form>

    @push('test')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const selectRed = document.getElementById('red_id');
                const mentor1Select = document.getElementById('mentor_1_id');
                const mentor2Select = document.getElementById('mentor_2_id');

                selectRed.addEventListener('change', async () => {
                    const redId = selectRed.value;

                    // Limpia los selects de mentores anteriores
                    mentor1Select.innerHTML = '<option selected disabled>Seleccione mentor 1</option>';
                    mentor2Select.innerHTML = '<option selected disabled>Seleccione mentor 2</option>';

                    if (redId) {
                        try {
                            const response = await fetch(`/api/mentores/${redId}`);
                            const data = await response.json();

                            console.log(data);

                            if (data.length) {
                                data.forEach(mentor => {
                                    mentor1Select.innerHTML +=
                                        `<option value="${mentor.id}">${mentor.nombre}</option>`;
                                    mentor2Select.innerHTML +=
                                        `<option value="${mentor.id}">${mentor.nombre}</option>`;
                                });
                            } else {
                                mentor1Select.innerHTML =
                                    '<option selected disabled>No hay mentores</option>';
                                mentor2Select.innerHTML =
                                    '<option selected disabled>No hay mentores</option>';
                            }
                        } catch (error) {
                            console.error('Error cargando mentores:', error);
                        }
                    }
                });
            });
        </script>
    @endpush



</x-app-layout>
