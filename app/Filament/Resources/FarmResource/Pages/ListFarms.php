<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear nueva finca')
                ->modalWidth('7xl') // Personaliza si quieres
                //->slideOver(),
        ];
    }
    
}
