<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

final class DriverForm
{
    public static function schema(): array
    {
        return [
            Grid::make()
            ->schema([
                Section::make('Información')
                ->schema([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->autofocus()
                                ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                                ->label('Nombres')
                                ->unique(ignoreRecord: true)
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2])
                                ->required(),
                            TextInput::make('last_name')
                                ->required()
                                ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                                ->label('Apellidos')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('id_number')
                                ->required()
                                ->label('Cédula')
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('phone')
                                ->required()
                                ->label('Teléfono')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        ])
                        ->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
                ]),
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}