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
                            Hidden::make('maritime_id')
                                ->default(fn () => request()->route('record'))
                                ->required()
                            // TextInput::make('shipment')
                            //     ->autofocus()
                            //     ->label('Carga')
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1])
                            //     ->required(),
                            // TextInput::make('bl')
                            //     ->prefix('BL')
                            //     // ->dehydrateStateUsing(fn ($state) => 'BL ' . $state)
                            //     ->required()
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 3, 'lg' => 3, 'xl' => 3])
                            //     ->label('BL'),
                            // TextInput::make('booking')
                            //     ->required()
                            //     ->label('Booking')
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            // TextInput::make('carrier')
                            //     ->required()
                            //     ->label('Transportista')
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            // Select::make('logistic_id')
                            //     ->relationship('logistic', 'name')
                            //     ->required()
                            //     ->label('Carguera')
                            //     ->searchable()
                            //     ->preload()
                            //     ->createOptionForm(LogisticForm::schema())
                            //     ->columnSpan(['default' => 1, 'sm' => 2, 'md' => 4, 'lg' => 4, 'xl' => 4]),
                            // DatePicker::make('date')
                            //     ->required()
                            //     ->label('Fecha Salida')
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            // DatePicker::make('arrival_date')
                            //     ->required()
                            //     ->label('Fecha llegada')
                            //     ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        ])->columns(['default' => 1, 'sm' => 2, 'md' => 8, 'lg' => 8, 'xl' => 8,]),
                ]),
                // Section::make('Info de contenedor físico')
                // ->schema([
                //     Grid::make()
                //     ->schema([
                //         Select::make('driver_id')
                //             ->relationship('driver', modifyQueryUsing: fn (Builder $query) => $query->orderBy('name')->orderBy('last_name'),)
                //             ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} {$record->last_name}")
                //             ->searchable(['name', 'last_name'])
                //             ->label('Chofer')
                //             ->preload()
                //             ->createOptionForm(DriverForm::schema())
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         TextInput::make('plate')
                //             ->label('Placa')
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         TextInput::make('container_number')
                //             ->label('Número del contenedor')
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         TextInput::make('seal_bottle')
                //             ->label('Sello botella')
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         TextInput::make('seal_cable')
                //             ->label('Sello cable')
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         TextInput::make('seal_sticker')
                //             ->label('Sello sticker')
                //             ->columnSpan(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         Toggle::make('floor')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->reactive()
                //             ->label('Paletas al piso ¿Si o No?'),
                //         TextInput::make('num_pallets')
                //             ->numeric()
                //             ->label('Número de paletas al piso')
                //             ->visible(fn (Forms\Get $get) => $get('floor'))
                //             ->columnSpan(['default' => 1, 'sm' =>1, 'md' => 1, 'lg' => 1, 'xl' => 1]),
                //         ])->columns(['default' => 1, 'sm' => 2, 'md' => 3, 'lg' => 4, 'xl' => 4,]),
                //     ]),
                // Section::make('Configuración cajas')
                // ->schema([
                //     Grid::make()
                //     ->schema([
                //         Toggle::make('fb_status')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->label('FB')
                //             ->default(false),
                //         Toggle::make('hb_status')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->label('HB')
                //             ->default(true),
                //         Toggle::make('qb_status')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->label('QB')
                //             ->default(true),
                //         Toggle::make('eb_status')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->label('EB')
                //             ->default(true),
                //         Toggle::make('db_status')
                //             ->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                //             ->label('DB')
                //             ->default(false)
                //     ])->columns(['default' => 2, 'sm' => 3, 'md' => 4, 'lg' => 5, 'xl' => 5,]),
                // ]),
                // Section::make('Info de los termógrafos')
                // ->schema([
                //     Grid::make()
                //     ->schema([
                //         Repeater::make('thermographs')
                //             ->label('Termógrafos')
                //             ->relationship('thermographs')
                //             ->schema([
                //                 TextInput::make('code')
                //                     ->columns(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1,])
                //                     ->label('Código'),
                //                 Select::make('place')
                //                     ->columns(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1,])
                //                     ->label('Lugar')
                //                     ->options([
                //                         'fondo' => 'Fondo',
                //                         'medio' => 'Medio',
                //                         'puerta' => 'Puerta',
                //                     ]),
                //                 TextInput::make('brand')
                //                     ->columns(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1,])
                //                     ->label('Marca'),
                //                 TextInput::make('maritime_id')
                //                     ->hidden(), // Sigue oculto
                //             ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 3, 'xl' => 3,]),

                //         ])->columns(['default' => 1, 'sm' => 1, 'md' => 1, 'lg' => 1, 'xl' => 1,]),
                //     ]),
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}