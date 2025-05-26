<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewFarm extends ViewRecord
{
    protected static string $resource = FarmResource::class;
    // protected static ?string $clusterBreadcrumb = 'cluster';

    // public function getBreadcrumbs(): array
    // {
    //     return [];
    // }

}
