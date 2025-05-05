{{-- el id podria pasar o no --}}
@if (isset($id))
    <select name="{{ $name }}" id="{{ $id }}"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        {{ $slot }}
    </select>
@else
    <select name="{{ $name }}"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        {{ $slot }}
    </select>
@endif
