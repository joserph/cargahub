<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Correo:</strong> {{ $record->email }}</div>
    <div><strong>Telefono:</strong> {{ $record->phone }}</div>
    <div><strong>Sitio Web:</strong> {{ $record->web }}</div>
    <div><strong>Dirección:</strong> {{ $record->address }} {{ $record->state->name }}, {{ $record->city->name }} - {{ $record->country->name }}</div>
    <div><strong>Nombre Legal:</strong> {{ $record->legal_name }}</div>
    <div><strong>Direccion Legal:</strong> {{ $record->legal_address }}</div>
    <div><strong>Correo de Contacto:</strong> {{ $record->contact_email }}</div>
    <div><strong>Telefono de Contacto:</strong> {{ $record->contact_phone }}</div>
    {{-- <p>{{ $record->emails->pluck('email')->implode(', ') }}</p> --}}
    <div><strong>Creado el:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>
