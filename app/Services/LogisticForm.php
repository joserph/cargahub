<?php

namespace App\Services;

use App\Models\City;
use App\Models\Logistic;
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
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;

final class LogisticForm
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
                            TextInput::make('ruc')
                                ->label('RUC')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('web')
                                ->label('Sitio Web')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            Toggle::make('status')
                                ->label('¿Empresa activa?')
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    if ($state) {
                                        // Solo permitir si no hay otra activa
                                        $activeExists = Logistic::where('status', true)->exists();

                                        if ($activeExists) {
                                            // Mostrar error y apagar el toggle
                                            Notification::make()
                                                ->title('Solo puede haber una empresa activa.')
                                                ->danger()
                                                ->send();

                                            $set('status', false);
                                        }
                                    }
                                }),
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
                            ->dehydrateStateUsing(fn ($state) => ucwords(strtolower($state)))
                            ->required(),
                        ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 3, 'xl' => 3,]),
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
                                TextInput::make('logistic_id')
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
                                TextInput::make('logistic_id')
                                    ->hidden()
                            ])->addActionLabel('Agregar otro Email')
                            ->reorderable(true),
                        ])->columns(['default' => 1, 'sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                ])->columnSpan(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 2, 'xl' => 2]),
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}