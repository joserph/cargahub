<x-filament::page>
    <div class="overflow-x-auto">
        {{-- @foreach ($this->hbTotals as $cliente => $item)
            <h1>{{ $cliente }} - {{ $item }}</h1>
        @endforeach --}}
        @foreach ($this->hbTotals as $clientName => $totals)
            <tr>
                <td>{{ $clientName }}</td>
                <td>{{ $totals['hb'] }}</td>
                <td>{{ $totals['qb'] }}</td>
            </tr>
        @endforeach

        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

        <div class="grid flex-1 auto-cols-fr gap-y-8">
            <div class="flex flex-col gap-y-6">
                <div x-load="" x-load-src="https://cargahub.test/js/filament/tables/components/table.js?v=3.3.4.0" x-data="table" class="fi-ta">
                    <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                        <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                            <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 text-[8px]">
                                @foreach ($this->clientsCoord as $client)
                                <thead class="divide-y divide-gray-200 dark:divide-white/5">
                                    <tr style="background-color: #A1C7E0">
                                        <th colspan="22" class="fi-ta-header-cell px-3 py-2 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-[8px] font-semibold text-gray-950 dark:text-white">
                                                    {{ $client->name }}
                                                </span>
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <!-- Primer th (sin fondo especial) -->
                                        <th colspan="4" class="fi-ta-header-cell px-3 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center" style="background-color: #fafafa;">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    
                                                </span>
                                            </span>
                                        </th>
                                        <!-- Segundo th (con fondo verde) -->
                                        <th colspan="{{ ($totalTypeBox + 2) }}" class="fi-ta-header-cell px-3 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center" style="background-color: #8AA6A3;">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Coordinado
                                                </span>
                                            </span>
                                        </th>
                                        <th colspan="{{ ($totalTypeBox + 2) }}" class="fi-ta-header-cell px-3 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center" style="background-color: #04BF9D;">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    Recibido
                                                </span>
                                            </span>
                                        </th>
                                        <th colspan="4" 
                                            class="fi-ta-header-cell px-3 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center" style="background-color: #fafafa;">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                                    
                                                </span>
                                            </span>
                                        </th>
                                    </tr>

                                    <tr class="bg-gray-50 dark:bg-white/5">
                                        <th class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1 border border-gray-300">
                                            <div class="px-3 py-2">
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
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs text-gray-950 dark:text-white" style="font-size: 10px">
                                                    Finca
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name border border-gray-300 text-center">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    HAWB
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-type-load border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    Variedad
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    PCS
                                                </span>
                                            </span>
                                        </th>
                                        @unless($record->fb_status == 0)
                                            <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                                <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                    <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                        FB
                                                    </span>
                                                </span>
                                            </th>
                                        @endunless
                                        @unless($record->hb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    HB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->qb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    QB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->eb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    EB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->db_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    DB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    FULL
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    PCS
                                                </span>
                                            </span>
                                        </th>
                                        @unless($record->fb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    FB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->hb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    HB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->qb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    QB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->eb_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    EB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        @unless($record->db_status == 0)
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    DB
                                                </span>
                                            </span>
                                        </th>
                                        @endunless
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    FULL
                                                </span>
                                            </span>
                                        </th>

                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    Dev
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    Faltantes
                                                </span>
                                            </span>
                                        </th>
                                        <th class="fi-ta-header-cell px-1 py-1 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-owners.owner border border-gray-300" style=";">
                                            <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-center">
                                                <span class="fi-ta-header-cell-label text-xs font-semibold text-gray-950 dark:text-white" style="font-size: 10px">
                                                    Observación
                                                </span>
                                            </span>
                                        </th>
                                        <th class="border border-gray-300" aria-label="Acciones" class="fi-ta-actions-header-cell w-1">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                                    @foreach($this->coordinations as $item)
                                        @if($client->id == $item->client_id)
                                            <tr x-bind:class="{
                                                    'hidden': false &amp;&amp; isGroupCollapsed(null),
                                                    'bg-gray-50 dark:bg-white/5': isRecordSelected('1'),
                                                    '[&amp;&gt;*:first-child]:relative [&amp;&gt;*:first-child]:before:absolute [&amp;&gt;*:first-child]:before:start-0 [&amp;&gt;*:first-child]:before:inset-y-0 [&amp;&gt;*:first-child]:before:w-0.5 [&amp;&gt;*:first-child]:before:bg-primary-600 [&amp;&gt;*:first-child]:dark:before:bg-primary-500': isRecordSelected('1'),
                                                }" class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="edLISNhftVa0ff2EGFT4.table.records.1">
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1 border border-gray-300">
                                                    <div class="px-3 py-2">
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
                                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                                <div class="flex ">
                                                                    <div class="flex max-w-max" style="">
                                                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                            <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white" style="font-size: 10px">
                                                                                {{ $item->farm->name }}
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
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="font-size: 10px">
                                                                            {{ $item->hawb }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-type-load border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.type_load">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="font-size: 10px">
                                                                            Pendiente
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-status border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.status">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-icon flex gap-1.5 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->pieces }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @unless($record->fb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->fb }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->hb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->hb }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->qb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->qb }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->eb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->eb }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->db_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->db }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->fulls }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->pieces_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @unless($record->fb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->fb_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->hb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->hb_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->qb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->qb_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->eb_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->eb_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                @unless($record->db_status == 0)
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->bd_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endunless
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->fulls_r }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->returns }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->faltantes }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-owners.owner border border-gray-300" wire:key="edLISNhftVa0ff2EGFT4.table.record.1.column.owners.owner">
                                                    <div class="fi-ta-col-wrp">
                                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-2">
                                                            <div class="flex ">
                                                                <div class="flex max-w-max" style="">
                                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                                        <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white  " style="">
                                                                            {{ $item->observation }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell border border-gray-300">
                                                    <div class="whitespace-nowrap px-3 py-2">
                                                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                                                            <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('verDetalle', '1')">
                                                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('verDetalle', '1')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                                </svg>
                                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('verDetalle', '1')">
                                                                    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                                                                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                                                                </svg>
                                                                <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                                                    Ver
                                                                </span>
                                                            </button>
                                                            <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled" wire:click="mountTableAction('edit', '1')">
                                                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('edit', '1')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                                    <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"></path>
                                                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"></path>
                                                                </svg>
                                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default="" wire:target="mountTableAction('edit', '1')">
                                                                    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                                                                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                                                                </svg>
                                                                <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                                                    Editar
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        @endif
                                        
                                    @endforeach
                                    {{-- <tr>
                                                <th colspan="5">Total</th>
                                                <th>{{ $this->hbTotals[$client->id]['hb'] ?? 0 }}</th>
                                                <th>{{ $this->hbTotals[$client->id]['qb'] ?? 0 }}</th>
                                            </tr> --}}
                                        @foreach ($this->hbTotals as $clientId => $totals)
                                        <h1>{{ $client->id }} - {{ $clientId }}</h1>
                                            @if ($client->id == $clientId)
                                                
                                                <tr>
                                                    <td colspan="5">{{ $client->name }}</td>
                                                    <td>{{ $totals['hb'] }}</td>
                                                    <td>{{ $totals['qb'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    </div>
</x-filament::page>
