<?php

namespace App\Filament\Resources\LogisticResource\Pages;

use App\Filament\Resources\LogisticResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogistics extends ListRecords
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear nueva empresa de logistica')
                ->modalWidth('7xl')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                    $data['user_update'] = auth()->id();

                    return $data;
                }) // Personaliza si quieres
                //->slideOver(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
