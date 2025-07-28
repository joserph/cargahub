<?php

namespace App\Filament\Resources\CoordinationMaritimeResource\Pages;

use App\Filament\Resources\CoordinationMaritimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoordinationMaritime extends EditRecord
{
    protected static string $resource = CoordinationMaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
