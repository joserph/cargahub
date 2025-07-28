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
            Actions\CreateAction::make(),
        ];
    }
}
