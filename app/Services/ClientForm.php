<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
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

final class ClientForm
{

    protected static array $typeLoad = [
        'AEREO'     => 'AÉREO',
        'MARITIMO'  => 'MARÍTIMO',
    ];
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
                                ->label('Nombre del cliente')
                                ->unique(ignoreRecord: true)
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2])
                                ->required(),
                            Select::make('marketers')
                                ->relationship('marketers', 'name')
                                ->label('Comercializadoras')
                                ->searchable()
                                ->preload()
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 1, 'lg' => 2, 'xl' => 2])
                                ->multiple(),
                            Select::make('type_load')
                                ->label('Tipo de Carga')
                                ->options(self::$typeLoad)
                                ->required(),
                            Toggle::make('status')
                                ->label('Estatus')
                                ->required(),
                            Toggle::make('poa')
                                ->label('POA')
                                ->required(),
                        ])
                        ->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
                ]),
                Section::make('Dirección')
                ->schema([
                    Grid::make()
                    ->schema([
                        Select::make('country_id')
                            ->relationship('country', 'name')
                            ->label('País')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set){
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                        Select::make('state_id')
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->label('Estado')
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                            ->required(),
                        Select::make('city_id')
                            ->options(fn (Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->label('Ciudad')
                            ->preload()
                            ->required(),
                        TextInput::make('address')
                            ->label('Dirección')
                            ->columnSpan(['default' => 1, 'sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                            ->dehydrateStateUsing(fn ($state) => ucwords($state))
                            ->required(),
                        TextInput::make('zip_code')
                            ->label('Zip Code')
                            ->required(),
                        ])
                        ->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 3, 'xl' => 3,]),
                    ]),
                Section::make('Teléfonos y Emails')
                ->schema([
                    Grid::make()
                    ->schema([
                        Repeater::make('phones')
                            ->label('Teféfono')
                            ->relationship()
                            ->schema([
                                TextInput::make('phone')
                                    ->numeric()
                                    ->label('Telefono')
                                    ->required(),
                                TextInput::make('farm_id')
                                    ->hidden()
                                    ->required(),
                            ])->addActionLabel('Agregar otro Teléfono')
                            ->reorderable(true),
                        Repeater::make('emails')
                            ->label('Email')
                            ->relationship()
                            ->schema([
                                TextInput::make('email')
                                    ->email()
                                    ->label('Email'),
                                TextInput::make('email_id')
                                    ->hidden()
                            ])->addActionLabel('Agregar otro Email')
                            ->reorderable(true),
                        ])->columns(['default' => 1, 'sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                ])->columnSpan(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 2, 'xl' => 2]),
                Section::make('Información de los propietarios')
                ->schema([
                    Grid::make()
                    ->schema([
                        Repeater::make('owners')
                        ->label('Nombre y Teléfono')
                        ->relationship('owners')
                        ->schema([
                            Grid::make([
                                'default' => 1, // Una columna por defecto (pantallas pequeñas)
                                'md' => 2,      // Dos columnas en pantallas medianas o más grandes
                                'sm' => 2
                            ])
                            ->schema([
                                TextInput::make('owner')
                                    ->label('Nombre del propietario'),
                                TextInput::make('phone')
                                    ->label('Teléfono'),
                                TextInput::make('client_id')
                                    ->hidden(), // Sigue oculto
                            ]),
                        ])
                        ->addActionLabel('Agregar otro Propietario')
                        ->reorderable(true),
                    ])->columns(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1])
                ])->columnSpan(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 2, 'xl' => 2])
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}