<?php

namespace App\Filament\Resources\SubClientResource\Pages;

use App\Filament\Resources\SubClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubClient extends EditRecord
{
    protected static string $resource = SubClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
