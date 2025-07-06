<?php

namespace App\Filament\Resources\MaritimeResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCountCard extends BaseWidget
{
    // protected function getStats(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    protected function getCards(): array
    {
        return [
            Stat::make('Total de usuarios', User::count())
            ->description('Registrados en el sistema')
            ->url(route('filament.admin.resources.users.index'))
            ->color('success'),
        ];
    }
}
