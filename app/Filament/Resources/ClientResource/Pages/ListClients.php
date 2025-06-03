<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->modalHeading('Crear nuevo cliente')
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
