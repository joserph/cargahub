<x-filament-panels::page>
<h2 class="text-xl font-bold mb-4">Datos del Maritime</h2>

<div>
    <p><strong>Nombre:</strong> {{ $record->bl }}</p>
    {{-- Agrega más campos que desees --}}
    <button type="button" class="btn btn-primary" wire:click='openCreateModal()' data-bs-toggle="tooltip" data-bs-placement="top" title="Crear">
        <i class="fa-solid fa-circle-plus"></i>dfsdfsdf
    </button>
</div>
</x-filament-panels::page>
