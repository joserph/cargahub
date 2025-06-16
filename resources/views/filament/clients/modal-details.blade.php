<div class="space-y-2">
    <div><strong>Nombre:</strong> {{ $record->name }}</div>
    <div><strong>Tipo de Carga:</strong> {{ $record->type_load }}</div>
    <div><strong>Comercializadoras:</strong>
        @forelse ($record->marketers as $marketer)
        <li>{{ $marketer->name }}</li>
        @empty
            <li>No hay comercializadoras asociados.</li>
        @endforelse
        {{-- {{ $record->marketers[0]->name }}</div> --}}
    <div><strong>Dirección:</strong> {{ $record->address }} {{ $record->state->name }}, {{ $record->city->name }} - {{ $record->country->name }}</div>
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
    <div><strong>Propietarios:</strong></div>
    <ul class="list-disc list-inside">
    @forelse ($record->owners as $owner)
       <li> {{ $owner->owner }}</li>
    @empty
         <li>No posee sitio web</li>
    @endforelse
    </ul>
    {{-- <p>{{ $record->emails->pluck('email')->implode(', ') }}</p> --}}
    <div><strong>Creado el:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</div>
    {{-- Agrega más campos según tu modelo --}}
</div>
