<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Email:</strong> {{ $record->email }}</div>
    <div><strong>Creado en:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>