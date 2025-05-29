<?php

namespace App\Services;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

final class MarketerForm
{
    public static function schema(): array
    {
        return [
            Section::make('Información')
            ->columns(['default' => 1, 'sm' => 2, 'md' => 3, 'lg' => 4, 'xl' => 4, '2xl' => 4])
            ->schema([
                TextInput::make('name')->columnSpan(['sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                    ->autofocus()
                    ->extraInputAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre de la Comercializadora')
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('tradename')->columnSpan(['sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 2])
                    ->extraInputAttributes(['class' => 'fi-uppercase'])
                    ->unique(ignoreRecord: true)
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                    ->required()
                    ->label('Nombre Comercial'),
                Toggle::make('status')->columnSpan(['sm' => 2, 'md' => 1, 'lg' => 1, 'xl' => 1])
                    ->label('Estatus')
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
            Section::make('Staff')
            ->columns(['default' => 2, 'sm' => 2, 'md' => 2, 'lg' => 2, 'xl' => 1, '2xl' => 1])
            ->columnSpan(['2xl' => 2, 'xl' => 2, 'lg' => 2])
            ->schema([
                Repeater::make('staffs')->columnSpan(['sm' => 1, 'md' => 1, 'lg' => 2, 'xl' => 2])
                    ->label('Personal')
                    ->relationship()
                    ->schema([
                        TextInput::make('staff')
                            ->dehydrateStateUsing(fn ($state) => strtoupper($state))
                            ->label('Personal'),
                        TextInput::make('marketer_id')
                            ->hidden()
                    ])->addActionLabel('Agregar otro Personal')
                    ->reorderable(true),
            ])

        ];
    }

    
}