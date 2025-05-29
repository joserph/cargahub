<?php

namespace App\Filament\Resources\MarketerResource\Pages;

use App\Filament\Resources\MarketerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMarketer extends CreateRecord
{
    protected static string $resource = MarketerResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        //dd('algo');
        $data['user_id'] = auth()->id();
        $data['user_update'] = auth()->id();

        return $data;
    }
}
