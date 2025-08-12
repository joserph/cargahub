<x-filament::page>
    <div class="overflow-x-auto">
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
