<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFarm extends CreateRecord
{
    protected static string $resource = FarmResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        //dd('algo');
        $data['user_id'] = auth()->id();
        $data['user_update'] = auth()->id();

        return $data;
    }
}
