<x-filament::widget>
    <x-filament::card>
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Coordinaciones Marítimas</h3>
            <x-filament::button
                tag="a"
                href="{{ \App\Filament\Resources\MaritimeResource::getUrl('coordination', ['record' => $record]) }}"
            >
                Ver Coordinaciones
            </x-filament::button>
        </div>
    </x-filament::card>
</x-filament::widget>
