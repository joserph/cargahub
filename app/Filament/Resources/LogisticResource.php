<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogisticResource\Pages;
use App\Filament\Resources\LogisticResource\RelationManagers;
use App\Models\Logistic;
use App\Services\LogisticForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogisticResource extends Resource
{
    protected static ?string $model = Logistic::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $modelLabel = 'Empresa de logística';
    protected static ?string $pluralLabel = 'Empresas de logística';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(LogisticForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('ruc')->label('RUC')->searchable(),
                IconColumn::make('status')->label('Estatus')->boolean(),
                TextColumn::make('phones.phone')->label('Teléfono')->icon('heroicon-m-phone')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('emails.email')->label('Correo')->icon('heroicon-m-envelope')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('state.name')->label('Estado')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('city.name')->label('Ciudad')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('address')->label('Direccion')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')->dateTime()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Logistic $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles de la empresa logística')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Logistic $record) {
                        return view('filament.logistics.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar empresa de logística: {$record->name}")
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_update'] = auth()->id();
            
                    return $data;
                })->modalWidth('7xl'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogistics::route('/'),
            // 'create' => Pages\CreateLogistic::route('/create'),
            'view' => Pages\ViewLogistic::route('/{record}'),
            // 'edit' => Pages\EditLogistic::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detalles de la empresa de logística')
                    ->schema([
                        TextEntry::make('name')->label('Nombre'),
                        TextEntry::make('ruc')->label('RUC'),
                        TextEntry::make('web')->label('Web'),
                        TextEntry::make('phones.phone')->label('Telefonos'),
                        TextEntry::make('emails.email')->label('Correos')->icon('heroicon-m-envelope'),
                        IconEntry::make('status')
                        ->label('Estatus')
                        ->icon(fn (string $state): string => match ($state) {
                            '1' => 'heroicon-o-check-circle',
                            '0' => 'heroicon-o-x-circle',
                        })->color(fn (string $state): string => match ($state) {
                            '1' => 'success',
                            '0' => 'danger',
                        }),
                    ])
                    ->columns(3),
                Section::make('Dirección')
                    ->schema([
                        TextEntry::make('country.name')->label('País'),
                        TextEntry::make('state.name')->label('Estado'),
                        TextEntry::make('city.name')->label('Ciudad'),
                        TextEntry::make('address')->label('Dirección'),
                    ])
                    ->columns(3),
            ]);
    }
}
