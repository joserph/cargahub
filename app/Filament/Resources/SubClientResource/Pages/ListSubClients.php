<?php

namespace App\Filament\Resources\SubClientResource\Pages;

use App\Filament\Resources\SubClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubClients extends ListRecords
{
    protected static string $resource = SubClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
