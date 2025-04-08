<?php

namespace App\Filament\Resources\VarietyResource\Pages;

use App\Filament\Resources\VarietyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVarieties extends ListRecords
{
    protected static string $resource = VarietyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
    public function getBreadcrumbs(): array
    {
        return [];
    }
}
