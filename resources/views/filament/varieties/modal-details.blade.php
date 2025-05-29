<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Nombre Científico:</strong> {{ $record->scientific_name }}</div>
    {{-- <p>{{ $record->emails->pluck('email')->implode(', ') }}</p> --}}
    <div><strong>Creado el:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>
