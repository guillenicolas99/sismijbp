<div class="relative z-0 w-full mb-5 group">
    <x-input-label value="Estado" />

    <select name="is_active"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected disabled>Seleccione estado</option>
        <option value="0" {{ $model->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
        <option value="1" {{ $model->is_active == 1 ? 'selected' : '' }}>Activo</option>
    </select>
</div>
