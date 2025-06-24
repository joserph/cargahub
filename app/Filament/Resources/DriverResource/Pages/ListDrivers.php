<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDrivers extends ListRecords
{
    protected static string $resource = DriverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear chofer')
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
