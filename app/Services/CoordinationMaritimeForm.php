<?php

namespace App\Services;

use App\Models\City;
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
                            TextInput::make('hawb')
                                ->required()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 2])
                                ->autofocus(),
                            TextInput::make('fb')
                                ->label('FB')
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('fulls',
                                        0.5 * (float) $state +
                                        0.5 * (float) $get('hb') +
                                        0.5 * (float) $get('qb') +
                                        0.5 * (float) $get('eb') +
                                        0.5 * (float) $get('db')
                                    );
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('hb')
                                ->label('HB')
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('fulls',
                                        0.5 * (float) $state +
                                        0.5 * (float) $get('hb') +
                                        0.5 * (float) $get('qb') +
                                        0.5 * (float) $get('eb') +
                                        0.5 * (float) $get('db')
                                    );
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('qb')
                                ->label('QB')
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('fulls',
                                        0.5 * (float) $state +
                                        0.5 * (float) $get('hb') +
                                        0.5 * (float) $get('qb') +
                                        0.5 * (float) $get('eb') +
                                        0.5 * (float) $get('db')
                                    );
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('eb')
                                ->label('EB')
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('fulls',
                                        0.5 * (float) $state +
                                        0.5 * (float) $get('hb') +
                                        0.5 * (float) $get('qb') +
                                        0.5 * (float) $get('eb') +
                                        0.5 * (float) $get('db')
                                    );
                                })
                                ->numeric()
                                ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                            TextInput::make('db')
                                ->label('DB')
                                ->live(debounce: 500)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('fulls',
                                        0.5 * (float) $state +
                                        0.5 * (float) $get('hb') +
                                        0.5 * (float) $get('qb') +
                                        0.5 * (float) $get('eb') +
                                        0.5 * (float) $get('db')
                                    );
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
                
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}