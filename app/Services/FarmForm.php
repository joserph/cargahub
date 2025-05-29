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

final class FarmForm
{
    public static function schema(): array
    {
        return [
            Section::make('Información')
            ->columns(['default' => 1, 'sm' => 2, 'md' => 3, 'lg' => 4, 'xl' => 4, '2xl' => 4])
            ->schema([
                TextInput::make('name')->columnSpan(['sm' => 2, 'md' => 2, 'lg' => 3, 'xl' => 3])
                    ->autofocus()
                    ->extraInputAttributes(['class' => 'fi-uppercase'])
                    // ->formatStateUsing(fn($state) => strtoupper($state))
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                    ->label('Nombre de la finca')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('ruc')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->unique(ignoreRecord: true)
                    ->numeric()
                    ->maxLength(13)
                    ->label('RUC')
                    ->required(),
                TextInput::make('tradename')->columnSpan(['sm' => 2, 'md' => 2, 'lg' => 3, 'xl' => 3])
                    ->extraInputAttributes(['class' => 'fi-uppercase'])
                    ->unique(ignoreRecord: true)
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                    ->required()
                    ->label('Nombre Comercial'),
                Select::make('varieties')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->relationship('varieties', 'name')
                    ->label('Variedades')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->multiple(),
                TextInput::make('web')->columnSpan(['sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                    ->label('Sitio Web')
                    ->prefix('http://'),
                Toggle::make('status')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->label('Estatus')
                    ->required(),
            ]),
            Section::make('Dirección')
            ->columns(['default' => 1, 'sm' => 2, 'md' => 3, 'lg' => 3, 'xl' => 3, '2xl' => 3])
            ->schema([
                Select::make('country_id')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
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
                Select::make('state_id')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->options(fn (Get $get): Collection => State::query()
                        ->where('country_id', $get('country_id'))
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->label('Estado')
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                    ->required(),
                Select::make('city_id')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->options(fn (Get $get): Collection => City::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->label('Ciudad')
                    ->preload()
                    ->required(),
                TextInput::make('address')
                    ->label('Dirección')
                    ->dehydrateStateUsing(fn ($state) => ucwords($state))
                    ->columnSpanFull()
                    ->required(),
                ]),
            Section::make('Teléfonos y Emails')
            ->columns(['default' => 1, 'sm' => 2, 'md' => 2, 'lg' => 4, 'xl' => 4, '2xl' => 4])
            ->columnSpan(['2xl' => 3, 'xl' => 3, 'lg' => 4])
            ->schema([
                Repeater::make('phones')->columnSpan(['sm' => 1, 'md' => 1, 'lg' => 2, 'xl' => 2])
                    ->label('Teféfono')
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
                    ])->addActionLabel('Agregar otro Teléfono')
                    ->reorderable(true),
                Repeater::make('emails')->columnSpan(['sm' => 1, 'md' => 1, 'lg' => 2, 'xl' => 2])
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
            ]),

        ];
    }

    
}