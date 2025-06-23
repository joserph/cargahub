<?php

namespace App\Filament\Resources\AirlineResource\Pages;

use App\Filament\Resources\AirlineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAirlines extends ListRecords
{
    protected static string $resource = AirlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear aerolínea')
                ->modalWidth('7xl')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                    $data['user_update'] = auth()->id();

                    return $data;
                }) // Personaliza si quieres
                //->slideOver()
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
