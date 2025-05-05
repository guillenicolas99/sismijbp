<x-app-layout>
    <div class="flex justify-between items-center my-4">
        <h1 class="text-2xl text-white">Lista de tickets para {{$evento->nombre}}</h1>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-table :columns="['#', 'Código', 'Asignado a', 'Categoría', 'Precio', 'Descuento', 'Abono', 'Estado']">
            @foreach ($tickets as $ticket)
                <tr
                    class="border-b dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 {{ $loop->iteration % 2 == 0 ? 'bg-gray-700' : 'bg-gray-800' }}">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $ticket->codigo }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $ticket->persona ? $ticket->persona->nombre : 'No asignado' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $ticket->categoria->nombre }}
                    </x-tb-table>
                    <x-tb-table>
                        ${{ $ticket->precio }}
                    </x-tb-table>
                    <x-tb-table>
                        ${{ $ticket->descuento }}
                    </x-tb-table>
                    <x-tb-table>
                        ${{ $ticket->abono }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $ticket->estado?->nombre }}
                    </x-tb-table>
                </tr>
            @endforeach
        </x-table>
        <div class="my-3">
            {{ $tickets->links() }}
        </div>
    </div>
</x-app-layout>