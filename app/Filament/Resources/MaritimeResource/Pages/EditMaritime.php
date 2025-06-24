<?php

namespace App\Filament\Resources\MaritimeResource\Pages;

use App\Filament\Resources\MaritimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaritime extends EditRecord
{
    protected static string $resource = MaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
