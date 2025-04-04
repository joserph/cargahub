<?php

namespace App\Filament\Resources\VarietyResource\Pages;

use App\Filament\Resources\VarietyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVariety extends CreateRecord
{
    protected static string $resource = VarietyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        dd('algo');
        $data['user_id'] = auth()->id();
        $data['user_update'] = auth()->id();

        return $data;
    }
}
