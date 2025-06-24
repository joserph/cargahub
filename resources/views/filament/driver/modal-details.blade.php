<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Apellido:</strong> {{ $record->last_name }}</div>
    <div><strong>Cédula:</strong> {{ $record->id_number }}</div>
    <div><strong>Teléfono:</strong> {{ $record->phone }}</div>
    
    <div><strong>Creado el:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>
