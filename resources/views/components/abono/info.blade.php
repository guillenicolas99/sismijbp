<div id="info-abono" class="hidden">
    <div class="w-full">
        <h2 id="ticket-titulo" class="text-2xl font-bold text-white">Ticket</h2>
    </div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Inforamción</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Comentarios</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <form class="flex flex-col gap-4" id="form-abono">

                <p><strong>Monto a abonar / pagar</strong></p>
                <p class="text-cyan-700"><strong>Atención:</strong> Precio: $<span id="ticket-precio">0</span> | Abonado: $<span
                        id="ticket-abonado">0</span></p>
                <x-text-input type="number" name="abono" id="abono" placeholder="Monto a abonar"
                    class="w-full" />
                <p><strong>Responsable:</strong> <span id="ticket-responsable">Nombre de la persona</span></p>
                <p><strong>Código de la ticket:</strong> <span id="ticket-codigo">123456789</span></p>

                <button class="btn btn-green" type="submit">Agregar pago / abono</button>
            </form>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <x-input-label for="responsable">Comentarios</x-input-label>
            <textarea name="responsable" id="responsable" placeholder="Agrega tu comentario"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"></textarea>
        </div>
    </div>
</div>
