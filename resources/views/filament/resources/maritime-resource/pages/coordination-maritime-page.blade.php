<x-filament::page>
    <div class="overflow-x-auto">
        
        <table class="border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300">OrbiQ</th>
                    <th class="border border-gray-300">OrbiQ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="border border-gray-300 ...">Indiana</td>
                <td class="border border-gray-300 ...">Indianapolis</td>
                </tr>
                <tr>
                <td class="border border-gray-300 ...">Ohio</td>
                <td class="border border-gray-300 ...">Columbus</td>
                </tr>
                <tr>
                <td class="border border-gray-300 ...">Michigan</td>
                <td class="border border-gray-300 ...">Detroit</td>
                </tr>
            </tbody>
        </table>

        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

        <div class="grid flex-1 auto-cols-fr gap-y-8">
            <div class="flex flex-col gap-y-6">
                <div x-load="" x-load-src="https://cargahub.test/js/filament/tables/components/table.js?v=3.3.4.0" x-data="table" class="fi-ta">
                    <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                        <div x-bind:hidden="! (true || (selectedRecords.length &amp;&amp; 1))" x-show="true || (selectedRecords.length &amp;&amp; 1)" class="fi-ta-header-ctn divide-y divide-gray-200 dark:divide-white/10">
                            <div x-show="true || (selectedRecords.length &amp;&amp; 1)" class="fi-ta-header-toolbar flex items-center justify-between gap-x-4 px-4 py-3 sm:px-6">
                                <div class="ms-auto flex items-center gap-x-4">ORBIQ</div>
                            </div>
                        </div>
                        <div class="fi-ta-selection-indicator flex flex-col justify-between gap-y-1 bg-gray-50 px-3 py-2 dark:bg-white/5 sm:flex-row sm:items-center sm:px-6 sm:py-1.5" wire:key="edLISNhftVa0ff2EGFT4.table.selection.indicator" colspan="7" x-bind:hidden="! selectedRecords.length" x-show="selectedRecords.length" hidden="true" style="display: none;">
                            <div class="flex gap-x-3">
                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin h-5 w-5 text-gray-400 dark:text-gray-500" x-show="isLoading" style="display: none;">
                                    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                                </svg>
                                <span x-text="
                                        window.pluralize('1 registro seleccionado|:count registros seleccionados', selectedRecords.length, {
                                            count: selectedRecords.length,
                                        })
                                    " class="text-sm font-medium leading-6 text-gray-700 dark:text-gray-200">1 registro seleccionado</span>
                            </div>
                            <div class="flex gap-x-3">
                                <div class="flex gap-x-3">
                                    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-md fi-link-size-md gap-1.5 fi-color-custom fi-color-primary" type="button" wire:loading.attr="disabled" x-on:click="selectAllRecords" x-show="2 !== selectedRecords.length" wire:key="edLISNhftVa0ff2EGFT4table.selection.indicator.actions.select-all.2.1">
                                    <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                        Selecciona todos 2
                                    </span>
                                    </button>
                                    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-md fi-link-size-md gap-1.5 fi-color-custom fi-color-danger" type="button" wire:loading.attr="disabled" x-on:click="deselectAllRecords">
                                        <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--danger-400);--c-600:var(--danger-600);">
                                            Deselecciona todos
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                            <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                                <thead class="divide-y divide-gray-200 dark:divide-white/5">
                                    <tr class="bg-gray-50 dark:bg-white/5">
                                        <th class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1 border border-gray-300">
                                            <div class="px-3 py-4">
                                                <label class="flex">
                                                    <input type="checkbox" class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-page-checkbox" wire:loading.attr="disabled" wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch" wire:key="edLISNhftVa0ff2EGFT4.table.bulk-select-page.checkbox.FYOQWK9pjCRbjmBq" x-bind:checked="const recordsOnPage = getRecordsOnPage()
                                                                                    if (recordsOnPage.length &amp;&amp; areRecordsSelected(recordsOnPage)) {
                                                                                        $el.checked = true
                                                                                        return 'checked'
                                                                                    }
                                                                                    $el.checked = false
                                                                                    return null" x-on:click="toggleSelectRecordsOnPage">
                                                    <span class="sr-only">
                                                    Seleccionar/deseleccionar todos los elementos para las acciones masivas.
                                                    </span>
                                                </label>
                                            </div>
                                        </th>
                                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Nombre
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-marketers.name border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Camercializadoras
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-type-load border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Tipo de Carga
                                                </span>
                                            </span>
                                        </th>
                                                    
                                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Estatus
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Propietarios
                                                </span>
                                            </span>
                                        </th>
                                        <th class="border border-gray-300" aria-label="Acciones" class="fi-ta-actions-header-cell w-1">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                                    <tr x-bind:class="{
                                            'hidden': false &amp;&amp; isGroupCollapsed(null),
                                            'bg-gray-50 dark:bg-white/5': isRecordSelected('1'),
                                            '[&amp;&gt;*:first-child]:relative [&amp;&gt;*:first-child]:before:absolute [&amp;&gt;*:first-child]:before:start-0 [&amp;&gt;*:first-child]:before:inset-y-0 [&amp;&gt;*:first-child]:before:w-0.5 [&amp;&gt;*:first-child]:before:bg-primary-600 [&amp;&gt;*:first-child]:dark:before:bg-primary-500': isRecordSelected('1'),
                                        }" class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="edLISNhftVa0ff2EGFT4.table.records.1">
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1 border border-gray-300">
                                            <div class="px-3 py-4">
                                                <label class="flex">
                                                    <input type="checkbox" class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox" wire:loading.attr="disabled" wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch" value="1" x-model="selectedRecords">
                                                    <span class="sr-only">
                                                        Seleccionar/deseleccionar el elemento 1 para las acciones masivas.
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.name">
                                            <div class="fi-ta-col-wrp">
                                                <a href="https://cargahub.test/admin/clients/1/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                    <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max" style="">
                                                                <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                    <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                                                        ASHLEY FLOWERS
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-marketers.name border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.marketers.name">
                                            <div class="fi-ta-col-wrp">
                                                <a href="https://cargahub.test/admin/clients/1/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                    <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max" style="">
                                                                <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                    <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                                                        CVFLOR GROUP
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-type-load border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.type_load">
                                            <div class="fi-ta-col-wrp">
                                                <a href="https://cargahub.test/admin/clients/1/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
                                                    <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                        <div class="flex ">
                                                            <div class="flex max-w-max" style="">
                                                                <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                    <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                                                        AEREO
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-status" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.status">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/1/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-icon flex gap-1.5 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                
                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--success-400);--c-500:var(--success-500);" class="fi-ta-icon-item fi-ta-icon-item-size-lg h-6 w-6 fi-color-custom text-custom-500 dark:text-custom-400 fi-color-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/1/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <div class="flex ">
                            <!--[if BLOCK]><![endif]-->                    
                    <div class="flex max-w-max" style="">
                        <!--[if BLOCK]><![endif]-->                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                    JULIAN NONE
                                </span>

                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                    <!--[if ENDBLOCK]><![endif]-->

                                                                            <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
    <div class="whitespace-nowrap px-3 py-4">
        <!--[if BLOCK]><![endif]-->    <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('verDetalle', '1')">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('verDetalle', '1')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('verDetalle', '1')">
    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
</svg>
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->

        <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
            Ver
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    </button><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]-->    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('edit', '1')">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('edit', '1')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"></path>
  <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('edit', '1')">
    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
</svg>
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->

        <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
            Editar
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    </button><!--[if ENDBLOCK]><![endif]-->

        <!--[if ENDBLOCK]><![endif]-->
    </div>
<!--[if ENDBLOCK]><![endif]-->
    </div>
</td>
                                    <!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if ENDBLOCK]><![endif]-->
</tr>
                            <!--[if ENDBLOCK]><![endif]-->

                                                                                
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]-->                                <tr x-bind:class="{
            'hidden': false &amp;&amp; isGroupCollapsed(null),
            'bg-gray-50 dark:bg-white/5': isRecordSelected('2'),
            '[&amp;&gt;*:first-child]:relative [&amp;&gt;*:first-child]:before:absolute [&amp;&gt;*:first-child]:before:start-0 [&amp;&gt;*:first-child]:before:inset-y-0 [&amp;&gt;*:first-child]:before:w-0.5 [&amp;&gt;*:first-child]:before:bg-primary-600 [&amp;&gt;*:first-child]:dark:before:bg-primary-500': isRecordSelected('2'),
        }" class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="edLISNhftVa0ff2EGFT4.table.records.2">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]-->                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
    <div class="px-3 py-4">
        <!--[if BLOCK]><![endif]-->                                                <label class="flex">
    <input type="checkbox" class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox" wire:loading.attr="disabled" wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch" value="2" x-model="selectedRecords">

    <!--[if BLOCK]><![endif]-->        <span class="sr-only">
            Seleccionar/deseleccionar el elemento 2 para las acciones masivas.
        </span>
    <!--[if ENDBLOCK]><![endif]-->
</label>
                                            <!--[if ENDBLOCK]><![endif]-->
    </div>
</td>
                                    <!--[if ENDBLOCK]><![endif]-->

                                    <!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]-->                                        
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name" wire:key="edLISNhftVa0ff2EGFT4.table.record.2.column.name">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/2/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <div class="flex ">
                            <!--[if BLOCK]><![endif]-->                    
                    <div class="flex max-w-max" style="">
                        <!--[if BLOCK]><![endif]-->                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                    SDFSDFS
                                </span>

                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-marketers.name" wire:key="edLISNhftVa0ff2EGFT4.table.record.2.column.marketers.name">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/2/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <div class="flex ">
                            <!--[if BLOCK]><![endif]-->                    
                    <div class="flex max-w-max" style="">
                        <!--[if BLOCK]><![endif]-->                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                    EQUINOCCIAL
                                </span>

                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-type-load" wire:key="edLISNhftVa0ff2EGFT4.table.record.2.column.type_load">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/2/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <div class="flex ">
                            <!--[if BLOCK]><![endif]-->                    
                    <div class="flex max-w-max" style="">
                        <!--[if BLOCK]><![endif]-->                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                    AEREO
                                </span>

                                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-status" wire:key="edLISNhftVa0ff2EGFT4.table.record.2.column.status">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/2/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-icon flex gap-1.5 px-3 py-4">
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                
                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--success-400);--c-500:var(--success-500);" class="fi-ta-icon-item fi-ta-icon-item-size-lg h-6 w-6 fi-color-custom text-custom-500 dark:text-custom-400 fi-color-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->
    <!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                                                            
                                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner" wire:key="edLISNhftVa0ff2EGFT4.table.record.2.column.owners.owner">
    <div class="fi-ta-col-wrp">
    <!--[if BLOCK]><![endif]-->        <a href="https://cargahub.test/admin/clients/2/view" class="flex w-full disabled:pointer-events-none justify-start text-start">
            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

        </a>
    <!--[if ENDBLOCK]><![endif]-->
</div>
</td>
                                    <!--[if ENDBLOCK]><![endif]-->

                                                                            <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
    <div class="whitespace-nowrap px-3 py-4">
        <!--[if BLOCK]><![endif]-->    <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('verDetalle', '2')">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('verDetalle', '2')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('verDetalle', '2')">
    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
</svg>
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->

        <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
            Ver
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    </button><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]-->    <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('edit', '2')">
        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->    <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('edit', '2')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"></path>
  <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"></path>
</svg><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('edit', '2')">
    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
</svg>
            <!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->

        <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
            Editar
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    </button><!--[if ENDBLOCK]><![endif]-->

        <!--[if ENDBLOCK]><![endif]-->
    </div>
<!--[if ENDBLOCK]><![endif]-->
    </div>
</td>
                                    <!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if ENDBLOCK]><![endif]-->
</tr>
                            <!--[if ENDBLOCK]><![endif]-->

                                                    <!--[if ENDBLOCK]><![endif]-->

                        <!--[if ENDBLOCK]><![endif]-->

                        <!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                    <!--[if ENDBLOCK]><![endif]-->
    </tbody>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</table>
            <!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]-->            <nav aria-label="Navegación de paginación" role="navigation" class="fi-pagination grid grid-cols-[1fr_auto_1fr] items-center gap-x-3 fi-ta-pagination px-3 py-3 sm:px-6">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]-->        <span class="fi-pagination-overview text-sm font-medium text-gray-700 dark:text-gray-200">
            Se muestran de 1 a 2 de 2 resultados
        </span>
    <!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]-->        <div class="col-start-2 justify-self-center">
            <label class="fi-pagination-records-per-page-select fi-compact">
                <div class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div class="fi-input-wrp-input min-w-0 flex-1">
        <select class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3" wire:model.live="tableRecordsPerPage">
    <!--[if BLOCK]><![endif]-->                            <option value="5">
                                5
                            </option>
                                                    <option value="10">
                                10
                            </option>
                                                    <option value="25">
                                25
                            </option>
                                                    <option value="50">
                                50
                            </option>
                                                    <option value="all">
                                Todos
                            </option>
                        <!--[if ENDBLOCK]><![endif]-->
</select>
    </div>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

                <span class="sr-only">
                    por página
                </span>
            </label>

            <label class="fi-pagination-records-per-page-select">
                <div class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500">
    <!--[if BLOCK]><![endif]-->        <div class="fi-input-wrp-prefix items-center gap-x-3 ps-3 flex border-e border-gray-200 pe-3 ps-3 dark:border-white/10">
            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <span class="fi-input-wrp-label whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                    por página
                </span>
            <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]-->

    <div class="fi-input-wrp-input min-w-0 flex-1">
        <select class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3" wire:model.live="tableRecordsPerPage">
    <!--[if BLOCK]><![endif]-->                            <option value="5">
                                5
                            </option>
                                                    <option value="10">
                                10
                            </option>
                                                    <option value="25">
                                25
                            </option>
                                                    <option value="50">
                                50
                            </option>
                                                    <option value="all">
                                Todos
                            </option>
                        <!--[if ENDBLOCK]><![endif]-->
</select>
    </div>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>
            </label>
        </div>
    <!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</nav>
        <!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

    <!--[if BLOCK]><![endif]-->    <form wire:submit.prevent="callMountedAction">
        
        <div aria-modal="true" role="dialog" x-data="{
        isOpen: false,

        livewire: null,

        close: function () {
            this.isOpen = false

            this.$refs.modalContainer.dispatchEvent(
                new CustomEvent('modal-closed', { id: 'edLISNhftVa0ff2EGFT4-action' }),
            )
        },

        open: function () {
            this.$nextTick(() =&gt; {
                this.isOpen = true

                
                this.$refs.modalContainer.dispatchEvent(
                    new CustomEvent('modal-opened', { id: 'edLISNhftVa0ff2EGFT4-action' }),
                )
            })
        },
    }" x-on:close-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-action') close()" x-on:open-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-action') open()" data-fi-modal-id="edLISNhftVa0ff2EGFT4-action" x-trap.noscroll="isOpen" x-bind:class="{
        'fi-modal-open': isOpen,
    }" class="fi-modal block">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div x-show="isOpen" style="display: none;">
        <div aria-hidden="true" x-show="isOpen" x-transition.duration.300ms.opacity="" class="fi-modal-close-overlay fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75" style="display: none;"></div>

        <div class="fixed inset-0 z-40 overflow-y-auto cursor-pointer">
            <div x-ref="modalContainer" x-on:click.self="
                        document.activeElement.selectionStart === undefined &amp;&amp;
                            document.activeElement.selectionEnd === undefined &amp;&amp;
                            $dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-action' })
                    " class="relative grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center sm:grid-rows-[1fr_auto_3fr] p-4" x-on:closed-form-component-action-modal.window="if (($event.detail.id === 'edLISNhftVa0ff2EGFT4') &amp;&amp; $wire.mountedActions.length) open()" x-on:modal-closed.stop="const mountedActionShouldOpenModal = false


                if (! mountedActionShouldOpenModal) {
                    return
                }

                if ($wire.mountedFormComponentActions.length) {
                    return
                }

                $wire.unmountAction(false, false)" x-on:opened-form-component-action-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4') close()">
                <div x-data="{ isShown: false }" x-init="
                        $nextTick(() =&gt; {
                            isShown = isOpen
                            $watch('isOpen', () =&gt; (isShown = isOpen))
                        })
                    " x-on:keydown.window.escape="$dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-action' })" x-show="isShown" x-transition:enter="duration-300" x-transition:leave="duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0" class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl hidden max-w-sm" style="display: none;">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
    </form>

    <!--[if ENDBLOCK]><![endif]-->

<!--[if BLOCK]><![endif]-->    <form wire:submit.prevent="callMountedTableAction">
        
        <div aria-modal="true" role="dialog" x-data="{
        isOpen: false,

        livewire: null,

        close: function () {
            this.isOpen = false

            this.$refs.modalContainer.dispatchEvent(
                new CustomEvent('modal-closed', { id: 'edLISNhftVa0ff2EGFT4-table-action' }),
            )
        },

        open: function () {
            this.$nextTick(() =&gt; {
                this.isOpen = true

                
                this.$refs.modalContainer.dispatchEvent(
                    new CustomEvent('modal-opened', { id: 'edLISNhftVa0ff2EGFT4-table-action' }),
                )
            })
        },
    }" x-on:close-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-table-action') close()" x-on:open-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-table-action') open()" data-fi-modal-id="edLISNhftVa0ff2EGFT4-table-action" x-trap.noscroll="isOpen" x-bind:class="{
        'fi-modal-open': isOpen,
    }" class="fi-modal block">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div x-show="isOpen" style="display: none;">
        <div aria-hidden="true" x-show="isOpen" x-transition.duration.300ms.opacity="" class="fi-modal-close-overlay fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75" style="display: none;"></div>

        <div class="fixed inset-0 z-40 overflow-y-auto cursor-pointer">
            <div x-ref="modalContainer" x-on:click.self="
                        document.activeElement.selectionStart === undefined &amp;&amp;
                            document.activeElement.selectionEnd === undefined &amp;&amp;
                            $dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-table-action' })
                    " class="relative grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center sm:grid-rows-[1fr_auto_3fr] p-4" x-on:closed-form-component-action-modal.window="if (($event.detail.id === 'edLISNhftVa0ff2EGFT4') &amp;&amp; $wire.mountedTableActions.length) open()" x-on:modal-closed.stop="const mountedTableActionShouldOpenModal = false


                if (! mountedTableActionShouldOpenModal) {
                    return
                }

                if ($wire.mountedFormComponentActions.length) {
                    return
                }

                $wire.unmountTableAction(false, false)" x-on:opened-form-component-action-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4') close()">
                <div x-data="{ isShown: false }" x-init="
                        $nextTick(() =&gt; {
                            isShown = isOpen
                            $watch('isOpen', () =&gt; (isShown = isOpen))
                        })
                    " x-on:keydown.window.escape="$dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-table-action' })" x-show="isShown" x-transition:enter="duration-300" x-transition:leave="duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0" class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl hidden max-w-sm" style="display: none;">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
    </form>

    <form wire:submit.prevent="callMountedTableBulkAction">
        
        <div aria-modal="true" role="dialog" x-data="{
        isOpen: false,

        livewire: null,

        close: function () {
            this.isOpen = false

            this.$refs.modalContainer.dispatchEvent(
                new CustomEvent('modal-closed', { id: 'edLISNhftVa0ff2EGFT4-table-bulk-action' }),
            )
        },

        open: function () {
            this.$nextTick(() =&gt; {
                this.isOpen = true

                
                this.$refs.modalContainer.dispatchEvent(
                    new CustomEvent('modal-opened', { id: 'edLISNhftVa0ff2EGFT4-table-bulk-action' }),
                )
            })
        },
    }" x-on:close-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-table-bulk-action') close()" x-on:open-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-table-bulk-action') open()" data-fi-modal-id="edLISNhftVa0ff2EGFT4-table-bulk-action" x-trap.noscroll="isOpen" x-bind:class="{
        'fi-modal-open': isOpen,
    }" class="fi-modal block">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div x-show="isOpen" style="display: none;">
        <div aria-hidden="true" x-show="isOpen" x-transition.duration.300ms.opacity="" class="fi-modal-close-overlay fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75" style="display: none;"></div>

        <div class="fixed inset-0 z-40 overflow-y-auto cursor-pointer">
            <div x-ref="modalContainer" x-on:click.self="
                        document.activeElement.selectionStart === undefined &amp;&amp;
                            document.activeElement.selectionEnd === undefined &amp;&amp;
                            $dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-table-bulk-action' })
                    " class="relative grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center sm:grid-rows-[1fr_auto_3fr] p-4" x-on:closed-form-component-action-modal.window="if (($event.detail.id === 'edLISNhftVa0ff2EGFT4') &amp;&amp; $wire.mountedTableBulkAction) open()" x-on:modal-closed.stop="const mountedTableBulkActionShouldOpenModal = false


                if (! mountedTableBulkActionShouldOpenModal) {
                    return
                }

                if ($wire.mountedFormComponentActions.length) {
                    return
                }

                $wire.unmountTableBulkAction(false)" x-on:opened-form-component-action-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4') close()">
                <div x-data="{ isShown: false }" x-init="
                        $nextTick(() =&gt; {
                            isShown = isOpen
                            $watch('isOpen', () =&gt; (isShown = isOpen))
                        })
                    " x-on:keydown.window.escape="$dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-table-bulk-action' })" x-show="isShown" x-transition:enter="duration-300" x-transition:leave="duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0" class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl hidden max-w-sm" style="display: none;">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
    </form>

    <!--[if ENDBLOCK]><![endif]-->

<!--[if BLOCK]><![endif]-->    <form wire:submit.prevent="callMountedInfolistAction">
        
        <div aria-modal="true" role="dialog" x-data="{
        isOpen: false,

        livewire: null,

        close: function () {
            this.isOpen = false

            this.$refs.modalContainer.dispatchEvent(
                new CustomEvent('modal-closed', { id: 'edLISNhftVa0ff2EGFT4-infolist-action' }),
            )
        },

        open: function () {
            this.$nextTick(() =&gt; {
                this.isOpen = true

                
                this.$refs.modalContainer.dispatchEvent(
                    new CustomEvent('modal-opened', { id: 'edLISNhftVa0ff2EGFT4-infolist-action' }),
                )
            })
        },
    }" x-on:close-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-infolist-action') close()" x-on:open-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-infolist-action') open()" data-fi-modal-id="edLISNhftVa0ff2EGFT4-infolist-action" x-trap.noscroll="isOpen" x-bind:class="{
        'fi-modal-open': isOpen,
    }" class="fi-modal block">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div x-show="isOpen" style="display: none;">
        <div aria-hidden="true" x-show="isOpen" x-transition.duration.300ms.opacity="" class="fi-modal-close-overlay fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75" style="display: none;"></div>

        <div class="fixed inset-0 z-40 overflow-y-auto cursor-pointer">
            <div x-ref="modalContainer" x-on:click.self="
                        document.activeElement.selectionStart === undefined &amp;&amp;
                            document.activeElement.selectionEnd === undefined &amp;&amp;
                            $dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-infolist-action' })
                    " class="relative grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center sm:grid-rows-[1fr_auto_3fr] p-4" x-on:closed-form-component-action-modal.window="if (($event.detail.id === 'edLISNhftVa0ff2EGFT4') &amp;&amp; $wire.mountedInfolistActions.length) open()" x-on:modal-closed.stop="const mountedInfolistActionShouldOpenModal = false


                if (! mountedInfolistActionShouldOpenModal) {
                    return
                }

                if ($wire.mountedFormComponentActions.length) {
                    return
                }

                $wire.unmountInfolistAction(false, false)" x-on:opened-form-component-action-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4') close()">
                <div x-data="{ isShown: false }" x-init="
                        $nextTick(() =&gt; {
                            isShown = isOpen
                            $watch('isOpen', () =&gt; (isShown = isOpen))
                        })
                    " x-on:keydown.window.escape="$dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-infolist-action' })" x-show="isShown" x-transition:enter="duration-300" x-transition:leave="duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0" class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl hidden max-w-sm" style="display: none;">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
    </form>

    <!--[if ENDBLOCK]><![endif]-->

<!--[if BLOCK]><![endif]-->    
    <form wire:submit.prevent="callMountedFormComponentAction">
        <div aria-modal="true" role="dialog" x-data="{
        isOpen: false,

        livewire: null,

        close: function () {
            this.isOpen = false

            this.$refs.modalContainer.dispatchEvent(
                new CustomEvent('modal-closed', { id: 'edLISNhftVa0ff2EGFT4-form-component-action' }),
            )
        },

        open: function () {
            this.$nextTick(() =&gt; {
                this.isOpen = true

                
                this.$refs.modalContainer.dispatchEvent(
                    new CustomEvent('modal-opened', { id: 'edLISNhftVa0ff2EGFT4-form-component-action' }),
                )
            })
        },
    }" x-on:close-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-form-component-action') close()" x-on:open-modal.window="if ($event.detail.id === 'edLISNhftVa0ff2EGFT4-form-component-action') open()" data-fi-modal-id="edLISNhftVa0ff2EGFT4-form-component-action" x-trap.noscroll="isOpen" x-bind:class="{
        'fi-modal-open': isOpen,
    }" class="fi-modal block">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <div x-show="isOpen" style="display: none;">
        <div aria-hidden="true" x-show="isOpen" x-transition.duration.300ms.opacity="" class="fi-modal-close-overlay fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75" style="display: none;"></div>

        <div class="fixed inset-0 z-40 overflow-y-auto cursor-pointer">
            <div x-ref="modalContainer" x-on:click.self="
                        document.activeElement.selectionStart === undefined &amp;&amp;
                            document.activeElement.selectionEnd === undefined &amp;&amp;
                            $dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-form-component-action' })
                    " class="relative grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center sm:grid-rows-[1fr_auto_3fr] p-4" x-on:modal-closed.stop="const mountedFormComponentActionShouldOpenModal = false


                if (mountedFormComponentActionShouldOpenModal) {
                    $wire.unmountFormComponentAction(false, false)
                }">
                <div x-data="{ isShown: false }" x-init="
                        $nextTick(() =&gt; {
                            isShown = isOpen
                            $watch('isOpen', () =&gt; (isShown = isOpen))
                        })
                    " x-on:keydown.window.escape="$dispatch('close-modal', { id: 'edLISNhftVa0ff2EGFT4-form-component-action' })" x-show="isShown" x-transition:enter="duration-300" x-transition:leave="duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100" x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0" class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl hidden max-w-sm" style="display: none;">
                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
    </form>

    <!--[if ENDBLOCK]><![endif]-->
</div>


        
    </div>

                

                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                
            </div>

        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
        {{ $record }}
        <hr>
        {{ $varieties }}
        <table class="min-w-full border border-gray-300 text-sm">
            @foreach ($this->items as $clientName => $records)
                {{-- Encabezado con nombre del cliente --}}
                <thead>
                    <tr>
                        <th colspan="19" class="text-center text-lg font-semibold bg-blue-100 text-blue-800 py-2">
                            {{ $clientName }}
                        </th>
                    </tr>
                </thead>

                {{-- Encabezados de columnas --}}
                <thead class="bg-gray-100">
                    <tr class="text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        <th class="px-2 py-1">Transferir</th>
                        <th class="px-2 py-1">Finca</th>
                        <th class="px-2 py-1">HAWB</th>
                        <th class="px-2 py-1">Variedad</th>
                        <th class="px-2 py-1 bg-gray-200">PCS</th>
                        <th class="px-2 py-1 bg-gray-200">HB</th>
                        <th class="px-2 py-1 bg-gray-200">QB</th>
                        <th class="px-2 py-1 bg-gray-200">EB</th>
                        <th class="px-2 py-1 bg-gray-200">FULL</th>
                        <th class="px-2 py-1 bg-green-100">PCS</th>
                        <th class="px-2 py-1 bg-green-100">HB</th>
                        <th class="px-2 py-1 bg-green-100">QB</th>
                        <th class="px-2 py-1 bg-green-100">EB</th>
                        <th class="px-2 py-1 bg-green-100">FULL</th>
                        <th class="px-2 py-1 bg-yellow-100">Dev</th>
                        <th class="px-2 py-1">Faltantes</th>
                        <th class="px-2 py-1">Observación</th>
                        <th class="px-2 py-1" colspan="2">Acciones</th>
                    </tr>
                </thead>

                {{-- Filas de registros --}}
                <tbody class="divide-y divide-gray-200">
                    @foreach ($records as $item)
                        <tr>
                            <td class="px-2 py-1 text-center">
                                <input type="checkbox" class="form-checkbox h-4 w-4" name="ids" value="{{ $item->id }}">
                            </td>
                            <td class="px-2 py-1">{{ $item->farm->name ?? '' }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->hawb }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->variety }}</td>

                            {{-- Coordinado --}}
                            <td class="px-2 py-1 text-center">{{ $item->pieces }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->hb }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->qb }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->eb }}</td>
                            <td class="px-2 py-1 text-center">{{ number_format($item->fulls, 3) }}</td>

                            {{-- Recibido --}}
                            <td class="px-2 py-1 text-center">{{ $item->recibido_pcs }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->recibido_hb }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->recibido_qb }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->recibido_eb }}</td>
                            <td class="px-2 py-1 text-center">{{ number_format($item->recibido_full, 3) }}</td>

                            <td class="px-2 py-1 text-center">{{ $item->dev }}</td>
                            <td class="px-2 py-1 text-center">{{ $item->faltantes }}</td>
                            <td class="px-2 py-1 text-red-600 text-center text-xs">
                                {{ $item->observacion }}
                            </td>

                            {{-- Botones --}}
                            <td class="px-2 py-1 text-center">
                                <button type="button"
                                    wire:click="$emit('editItem', {{ $item->id }})"
                                    class="px-2 py-1 text-xs text-yellow-700 border border-yellow-400 rounded hover:bg-yellow-50">
                                    ✏️
                                </button>
                            </td>
                            <td class="px-2 py-1 text-center">
                                <button type="button"
                                    wire:click="delete({{ $item->id }})"
                                    onclick="return confirm('¿Seguro de eliminar la coordinación?')"
                                    class="px-2 py-1 text-xs text-red-700 border border-red-400 rounded hover:bg-red-50">
                                    🗑️
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</x-filament::page>
