<x-app-layout>

    <x-table :columns="['#', 'Nombre', 'Correo', 'Rol', 'Acciones']">

        @foreach ($users as $user)
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <x-tb-table>
                    {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                </x-tb-table>
                <x-tb-table>
                    {{ $user->name }}
                </x-tb-table>
                <x-tb-table>
                    {{ $user->email }}
                </x-tb-table>
                <x-tb-table>
                    {{ $user->name }}
                </x-tb-table>
                <x-tb-table>
                    <a class="btn btn-yellow" href="{{route('users.edit', $user)}}">Editar</a>
                </x-tb-table>
            </tr>
        @endforeach
    </x-table>

</x-app-layout>
