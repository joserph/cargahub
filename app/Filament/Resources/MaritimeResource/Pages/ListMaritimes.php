<?php

namespace App\Filament\Resources\MaritimeResource\Pages;

use App\Filament\Resources\MaritimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaritimes extends ListRecords
{
    protected static string $resource = MaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear marítimo')
                ->modalWidth('7xl')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                    $data['user_update'] = auth()->id();

                    return $data;
                }) // Personaliza si quieres
                //->slideOver(),
        ];
    }
}
