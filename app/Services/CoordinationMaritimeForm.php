<?php

namespace App\Services;

use App\Models\City;
use App\Models\Client;
use App\Models\Farm;
use App\Models\Logistic;
use App\Models\State;
use Date;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Filament\Forms;

final class CoordinationMaritimeForm
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
                            Select::make('farm_id')
                                ->label('Finca')
                                ->options(Farm::query()
                                    ->pluck('name', 'id')
                                    ->toArray()
                                )
                                ->preload()
                                ->searchable()
                                ->autofocus()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 3])
                                ->required(),
                            Select::make('client_id')
                                ->label('Cliente')
                                ->options(Client::query()
                                    ->pluck('name', 'id')
                                    ->toArray()
                                )
                                ->searchable()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 3])
                                ->required(),
                            TextInput::make('hawb')
                                ->required()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 2]),
                            TextInput::make('fb')
                                ->label('FB')
                                ->default(0)
                                ->reactive()
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    CoordinationMaritimeForm::calcularValores($get, $set);
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('hb')
                                ->label('HB')
                                ->default(0)
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    CoordinationMaritimeForm::calcularValores($get, $set);
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('qb')
                                ->label('QB')
                                ->default(0)
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    CoordinationMaritimeForm::calcularValores($get, $set);
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('eb')
                                ->label('EB')
                                ->default(0)
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    CoordinationMaritimeForm::calcularValores($get, $set);
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('db')
                                ->label('DB')
                                ->default(0)
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    CoordinationMaritimeForm::calcularValores($get, $set);
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('fulls')
                                ->label('FBX')
                                ->disabled()
                                ->numeric()
                                ->reactive()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('pieces')
                                ->label('PCS')
                                ->disabled()
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                        ])->columns(['default' => 1, 'sm' => 2, 'md' => 8, 'lg' => 8, 'xl' => 8,]),
                ]),
                Section::make('Coordinacion')
                    ->schema([

                    ]),
                
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    private static function calcularValores(callable $get, callable $set): void
    {
        $set('fulls',
            1 * (float) $get('fb') +
            0.5 * (float) $get('hb') +
            0.25 * (float) $get('qb') +
            0.125 * (float) $get('eb') +
            0.0625 * (float) $get('db')
        );

        $set('pieces',
            (int) $get('fb') +
            (int) $get('hb') +
            (int) $get('qb') +
            (int) $get('eb') +
            (int) $get('db')
        );
    }

    
}