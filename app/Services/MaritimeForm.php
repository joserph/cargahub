<?php

namespace App\Services;

use App\Models\City;
use App\Models\Logistic;
use App\Models\State;
use Date;
use Filament\Forms\Components\DatePicker;
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

final class MaritimeForm
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
                            TextInput::make('shipment')
                                ->autofocus()
                                ->label('Carga')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 1, 'lg' => 1, 'xl' => 1])
                                ->required(),
                            TextInput::make('bl')
                                ->required()
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 3, 'lg' => 3, 'xl' => 3])
                                ->label('BL'),
                            TextInput::make('booking')
                                ->required()
                                ->label('Booking')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            TextInput::make('carrier')
                                ->required()
                                ->label('Transportista')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            Select::make('logistic_id')
                                ->relationship('logistic', 'name')
                                ->required()
                                ->label('Carguera')
                                ->searchable()
                                ->preload()
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4]),
                            DatePicker::make('date')
                                ->required()
                                ->label('Fecha Salida')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                            DatePicker::make('arrival_date')
                                ->required()
                                ->label('Fecha llegada')
                                ->columnSpan(['default' => 1, 'sm' => 4, 'md' => 2, 'lg' => 2, 'xl' => 2]),
                        ])->columns(['default' => 1, 'sm' => 3, 'md' => 8, 'lg' => 8, 'xl' => 8,]),
                ]),
                Section::make('Info de contenedor físico')
                ->schema([
                    Grid::make()
                    ->schema([
                        
                        ])->columns(['default' => 1, 'sm' => 3, 'md' => 3, 'lg' => 3, 'xl' => 3,]),
                    ]),
            ])->columns(['default' => 1, 'sm' => 4, 'md' => 4, 'lg' => 4, 'xl' => 4,]),
        ];
    }

    
}