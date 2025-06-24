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
            Actions\CreateAction::make(),
        ];
    }
}
