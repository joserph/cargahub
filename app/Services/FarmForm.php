<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

final class FarmForm
{
    protected static array $status = [
        'activa'        => 'Activa',
        'suspendida'    => 'Suspendida',
        'cerrada'       => 'Cerrada',
    ];

    public static function schema(): array
    {
        return [
            Section::make('Informacion')
                ->columns(3)
                ->schema([
                    TextInput::make('name')
                        ->autofocus()
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->columnSpan(2)
                        ->label('Nombre de la finca')
                        ->unique(ignoreRecord: true)
                        ->required(),
                    TextInput::make('ruc')
                        ->unique(ignoreRecord: true)
                        ->numeric()
                        ->maxLength(13)
                        ->label('RUC')
                        ->required(),
                    TextInput::make('tradename')
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->required()
                        ->label('Nombre Comercial'),
                    Select::make('status')
                        ->options(self::$status)
                        ->required(),
                    Repeater::make('phones')
                        ->label('Tefefono')
                        ->relationship()
                        ->schema([
                            TextInput::make('phone')
                                ->numeric()
                                ->prefix('+593')
                                ->label('Telefono')
                                ->required(),
                            TextInput::make('farm_id')
                                ->hidden()
                                ->required(),
                        ])->addActionLabel('Agregar otro Telefono')
                        ->reorderable(true),
                    /* Repeater::make('emails')
                        ->label('Correo')
                        ->relationship()
                        ->schema([
                            TextInput::make('email')
                                ->label('Correo')
                                ->email()
                                ->required(),
                            TextInput::make('farm_id')
                                ->hidden()
                                ->required(),
                        ])->addActionLabel('Agregar otro Correo')
                        ->reorderable(true), */
                ]),
            Section::make('Direccion')
                ->columns(3)
                ->schema([
                    Select::make('country_id')
                        ->relationship('country', titleAttribute:'name')
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
                        ->preload()
                        ->live()
                        ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                        ->required(),
                    Select::make('city_id')
                        ->options(fn (Get $get): Collection => City::query()
                            ->where('state_id', $get('state_id'))
                            ->pluck('name', 'id'))
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('address')
                        ->columnSpan(2)
                        ->required(),
                        
                ])
        ];
    }

    
}