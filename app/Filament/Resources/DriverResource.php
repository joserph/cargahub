<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Models\Driver;
use App\Services\DriverForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $modelLabel = 'Chofer';
    protected static ?string $pluralLabel = 'Choferes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(DriverForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombres')->searchable(),
                TextColumn::make('last_name')->label('Apellidos')->searchable(),
                TextColumn::make('id_number')->label('Cédula')->searchable(),
                TextColumn::make('phone')->label('Teléfono')->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Driver $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles del chofer')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Driver $record) {
                        return view('filament.driver.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar chofer: {$record->name}")
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
            'index' => Pages\ListDrivers::route('/'),
            // 'create' => Pages\CreateDriver::route('/create'),
            'view' => Pages\ViewDriver::route('/{record}'),
            // 'edit' => Pages\EditDriver::route('/{record}/edit'),
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
                Section::make('Detalles del chofer')
                    ->schema([
                        TextEntry::make('name')->label('Nombre'),
                        TextEntry::make('last_name')->label('Apellido'),
                        TextEntry::make('id_number')->label('Cédula'),
                        TextEntry::make('phone')->label('Teléfono'),
                    ])
                    ->columns(2),
                
            ]);
    }
}
