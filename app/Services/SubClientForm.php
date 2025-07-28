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

final class SubClientForm
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
                            Select::make('client_id')
                                ->autofocus()
                                ->relationship('client', 'name')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2])
                                ->required()
                                ->label('Cliente'),
                            TextInput::make('name')
                                ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                                ->label('Nombre del cliente')
                                ->unique(ignoreRecord: true)
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2])
                                ->required(),
                            Select::make('submarketers')
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
                        ])
                        ->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
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
                                TextInput::make('client_id')
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
                                TextInput::make('client_id')
                                    ->hidden()
                            ])->addActionLabel('Agregar otro Email')
                            ->reorderable(true),
                        ])->columns(['default' => 1, 'sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                ])->columnSpan(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 2, 'xl' => 2]),
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }
}