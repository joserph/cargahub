<?php

namespace App\Filament\Resources\MaritimeResource\Pages;

use App\Filament\Resources\MaritimeResource;
use App\Models\Maritime;
use App\Services\CoordinationMaritimeForm;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Concerns\CanUseActions;
use Filament\Pages\Actions\Action;

class CoordinationMaritimePage extends Page
{
    protected static string $resource = MaritimeResource::class;

    protected static string $view = 'filament.resources.maritime-resource.pages.coordination-maritime-page';

    public Maritime $record;

    public function mount(Maritime $record): void
    {
        $this->record = $record;
    }

    public static function getRouteName(?string $panel = null): string
    {
        return static::getResource()::getRouteBaseName($panel) . '.coordination';
    }

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Coordinaciones contenedor ' . $this->record->bl;;
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('agregarCoordinacion')
                ->label('Agregar Coordinación')
                ->form(CoordinationMaritimeForm::schema())
                ->action(function (array $data) {
                    // Aquí puedes guardar la información
                    
                    \App\Models\CoordinationMaritime::create([
                        'maritime_id' => $this->record->id,
                        ...$data,
                    ]);

                    $this->dispatch('notify', type: 'success', message: '¡Coordinación guardada!');
                })
                ->modalHeading('Item Coordinación Marítima')
                ->modalWidth('7xl'),
        ];
    }

}
