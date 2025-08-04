{{-- <x-filament-widgets::widget>
    <x-filament::section>
        
    </x-filament::section>
</x-filament-widgets::widget> --}}

<x-filament::widget>
    <x-filament::card>
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Coordinaciones Marítimas</h3>
            <x-filament::button
                tag="a"
                href="{{ route('filament.admin.resources.coordination-maritimes.index', ['maritime' => $record->id]) }}"
            >
                Ver Coordinaciones
            </x-filament::button>
        </div>
    </x-filament::card>
</x-filament::widget>
