<x-app-layout>
    <div class="flex justify-between items-center my-4">
        <h1 class="text-2xl text-white">Lista de tickets para {{ $evento->nombre }}</h1>
    </div>

    <div class="grid grid-cols-1">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table :columns="['#', 'Código', 'Asignado a', 'Categoría', '']">
                @foreach ($tickets as $ticket)
                    <tr
                        class="border-b dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 {{ $loop->iteration % 2 == 0 ? 'bg-gray-700' : 'bg-gray-800' }}">
                        <x-tb-table>{{ $loop->iteration }}</x-tb-table>
                        <x-tb-table>{{ $ticket->codigo }}</x-tb-table>
                        <x-tb-table>{{ $ticket->persona ? $ticket->persona->nombres . ' ' . $ticket->persona->apellidos : 'No asignado' }}</x-tb-table>
                        <x-tb-table>{{ $ticket->categoria->nombre }}</x-tb-table>
                        <x-tb-table>
                            <button class="bg-cyan-500 hover:bg-cyan-800 btn rounded transition-all asignar-btn"
                                data-ticket-id="{{ $ticket->id }}">
                                Asignar
                            </button>
                        </x-tb-table>
                    </tr>
                    {{-- Menú oculto de asignación --}}
                    <tr id="asignar-menu-{{ $ticket->id }}"
                        class="hidden bg-gray-100 dark:hover:bg-gray-600 {{ $loop->iteration % 2 == 0 ? 'bg-gray-700' : 'bg-gray-800' }}">
                        <td colspan="5" class="p-4 ml-3">
                            <form class="flex flex-wrap gap-4 items-center form-asignar-ticket"
                                data-ticket-id="{{ $ticket->id }}"
                                data-action="{{ route('tickets.asignarPersona', $ticket->id) }}">
                                <select class="form-select red-select" data-ticket-id="{{ $ticket->id }}">
                                    <option value="">Seleccionar red</option>
                                    @foreach ($redes as $red)
                                        <option value="{{ $red->id }}">{{ $red->nombre }}</option>
                                    @endforeach
                                </select>

                                <select class="form-select persona-select" name="persona_id"
                                    id="persona-select-{{ $ticket->id }}" disabled>
                                    <option value="">Seleccionar persona</option>
                                </select>

                                <button class="bg-green-600 hover:bg-green-800 text-white px-3 py-1 rounded"
                                    type="submit">
                                    Confirmar
                                </button>
                                <button class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded cerrar-btn"
                                    data-ticket-id="{{ $ticket->id }}">
                                    Cerrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </x-table>
            <div class="my-3">
                {{ $tickets->links() }}
            </div>
        </div>


        <script>
            const asignarMenus = document.querySelectorAll('[id^="asignar-menu-"]');

            function closeAllMenus(except = null) {
                document.querySelectorAll('[id^="asignar-menu-"]').forEach(menu => {
                    if (menu !== except && !menu.classList.contains('hidden')) {
                        menu.classList.remove('slide-down');
                        menu.classList.add('slide-up');
                        setTimeout(() => {
                            menu.classList.add('hidden');
                            menu.classList.remove('slide-up');
                        }, 300);
                    }
                });
            }

            document.querySelectorAll('.asignar-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const ticketId = this.getAttribute('data-ticket-id');
                    const currentMenu = document.getElementById(`asignar-menu-${ticketId}`);

                    if (currentMenu.classList.contains('hidden')) {
                        closeAllMenus();
                        currentMenu.classList.remove('hidden');
                        currentMenu.classList.add('slide-down');
                    } else {
                        currentMenu.classList.remove('slide-down');
                        currentMenu.classList.add('slide-up');
                        setTimeout(() => {
                            currentMenu.classList.add('hidden');
                            currentMenu.classList.remove('slide-up');
                        }, 300);
                    }
                });
            });

            document.querySelectorAll('.cerrar-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const ticketId = this.getAttribute('data-ticket-id');
                    const menu = document.getElementById(`asignar-menu-${ticketId}`);
                    menu.classList.remove('slide-down');
                    menu.classList.add('slide-up');
                    setTimeout(() => {
                        menu.classList.add('hidden');
                        menu.classList.remove('slide-up');
                    }, 300);
                });
            });


            // Cargar personas al seleccionar red
            document.querySelectorAll('.red-select').forEach(select => {
                select.addEventListener('change', function() {
                    const redId = this.value;
                    const ticketId = this.getAttribute('data-ticket-id');
                    const personaSelect = document.getElementById(`persona-select-${ticketId}`);

                    fetch(`/tickets/getPersonas/${redId}`)
                        .then(response => response.json())
                        .then(data => {
                            personaSelect.innerHTML = '<option value="">Seleccionar persona</option>';
                            if (data.length > 0) {
                                personaSelect.removeAttribute('disabled');
                                data.forEach(persona => {
                                    const option = document.createElement('option');
                                    option.value = persona.id;
                                    option.textContent = persona.nombres + ' ' + persona.apellidos;
                                    option.classList.add('persona-option');
                                    personaSelect.appendChild(option);
                                });
                            } else {
                                personaSelect.setAttribute('disabled', 'disabled');
                            }
                        });
                });
            });

            document.querySelectorAll('.form-asignar-ticket').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const ticketId = this.dataset.ticketId;
                    const actionUrl = this.dataset.action;
                    const personaSelect = this.querySelector('select[name="persona_id"]');
                    const personaId = personaSelect.value;

                    if (!personaId) {
                        alert('Debes seleccionar una persona.');
                        return;
                    }

                    fetch(actionUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                persona_id: personaId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            alert(data.message);
                            location.reload();
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Ocurrió un error al asignar la ticket.');
                        });
                });
            });
        </script>

        <style>
            .slide-down {
                animation: slideDown 0.3s ease-out forwards;
            }

            .slide-up {
                animation: slideUp 0.3s ease-in forwards;
            }

            @keyframes slideDown {
                0% {
                    opacity: 0;
                    transform: translateY(-10%);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideUp {
                0% {
                    opacity: 1;
                    transform: translateY(0);
                }

                100% {
                    opacity: 0;
                    transform: translateY(-10%);
                }
            }
        </style>



</x-app-layout>
