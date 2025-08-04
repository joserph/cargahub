<?php

namespace App\Filament\Resources\MaritimeResource\Pages;

use App\Filament\Resources\MaritimeResource;
use App\Filament\Resources\MaritimeResource\Widgets\CoordinationMaritimeLinkWidget;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaritime extends ViewRecord
{
    protected static string $resource = MaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CoordinationMaritimeLinkWidget::class
        ];
    }
}
