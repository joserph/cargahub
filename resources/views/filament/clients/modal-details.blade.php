<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Comercializadoras:</strong> {{ $record->marketers['name'] }}</div>
    <div><strong>Nombre Comercial:</strong> {{ $record->tradename }}</div>
    <div><strong>Dirección:</strong> {{ $record->address }} {{ $record->state }}, {{ $record->city->name }} - {{ $record->country->name }}</div>
    <div><strong>Teléfonos:</strong></div>
    <ul class="list-disc list-inside">
    @forelse ($record->phones as $phone)
        <li>{{ $phone->phone }}</li>
    @empty
        <li>No hay teléfonos asociados.</li>
    @endforelse
    </ul>
    <div><strong>Emails:</strong></div>
    <ul class="list-disc list-inside">
    @forelse ($record->emails as $email)
        <li>{{ $email->email }}</li>
    @empty
        <li>No hay emails asociados.</li>
    @endforelse
    </ul>
    <div><strong>Sitio Web:</strong>
    @if ($record->web)
        {{ $record->web }}
    @else
        No posee sitio web
    @endif
    </div>
    {{-- <p>{{ $record->emails->pluck('email')->implode(', ') }}</p> --}}
    <div><strong>Creado el:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>
