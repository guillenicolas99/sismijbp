<x-app-layout>
    <h2 class="text-white text-2xl">Editar permisos</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <p
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $user->name }}</p>

        <p
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $user->email }}</p>

    </div>
    @if (session('info'))
        {{ session('info') }}
    @endif
    <form action="post">
        @csrf

        <h4 class="text-2xl text-white">Roles</h4>
        <div class="flex">
            @foreach ($roles as $rol)
                <x-input-label>
                    {{ $rol->name }}
                    <input type="checkbox" value="{{ old('id', $rol->id) }}" name="" class="my-3 mr-2">
                </x-input-label>
            @endforeach
        </div>
        <button class="btn bg-cyan-700 rounded" type="submit">Asignar rol</button>
    </form>
</x-app-layout>
