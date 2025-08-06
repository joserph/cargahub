<?php

namespace App\Filament\Resources\CoordinationMaritimeResource\Pages;

use App\Filament\Resources\CoordinationMaritimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoordinationMaritimes extends ListRecords
{
    protected static string $resource = CoordinationMaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear item de coordinacion')
                ->modalWidth('7xl')
                ->mountUsing(function ($form) {
                    $form->fill([
                        'maritime_id' => request()->get('maritime'),
                        'user_id' => auth()->id(),
                        'user_update' => auth()->id(),
                    ]);
                })
                ->mutateFormDataUsing(function (array $data): array {
                    // Ya no necesitas tomar maritime_id aquí si lo pasaste arriba
                    
                    return $data;
                })
        ];
    }
}
