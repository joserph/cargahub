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

final class CompanyForm
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
                                ->label('Nombre de la empresa')
                                ->unique(ignoreRecord: true)
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2])
                                ->required(),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->label('Email')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('phone')
                                ->required()
                                ->label('Teléfono')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('web')
                                ->label('Sitio Web')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            FileUpload::make('logo') // o el nombre del campo que desees
                                ->image() // Asegura que solo permita imágenes
                                ->directory('company-logos') // Carpeta en la que se guardará
                                ->imageEditor() // (opcional) activa el editor de imágenes
                                ->imagePreviewHeight('200') // (opcional)
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
                        ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 3, 'xl' => 3,]),
                    ]),
                Section::make('Información Legal')
                ->schema([
                    Grid::make()
                    ->schema([
                        TextInput::make('legal_name')
                            ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                            ->label('Nombre legal de la empresa')
                            ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        TextInput::make('legal_address')
                            ->label('Dirección legal')
                            ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
                    ]),
                Section::make('Información de contacto')
                ->schema([
                    Grid::make()
                    ->schema([
                        TextInput::make('contact_email')
                            ->email()
                            ->label('Correo de contacto')
                            ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        TextInput::make('contact_phone')
                            ->label('Teléfono del contacto')
                            ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                    ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
                ])
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}