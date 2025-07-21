<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirlineResource\Pages;
use App\Filament\Resources\AirlineResource\RelationManagers;
use App\Models\Airline;
use App\Services\AirlineForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AirlineResource extends Resource
{
    protected static ?string $model = Airline::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static ?string $modelLabel = 'Aerolínea';
    protected static ?string $pluralLabel = 'Aerolíneas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(AirlineForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->square()->disk('public')->height(40),
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('ruc')->label('RUC')->searchable(),
                TextColumn::make('phone')->label('Teléfono')->icon('heroicon-m-phone')->sortable(),
                TextColumn::make('email')->label('Correo')->icon('heroicon-m-envelope')->sortable(),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Airline $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles de la aerolínea')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Airline $record) {
                        return view('filament.airlines.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar aerolínea: {$record->name}")
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAirlines::route('/'),
            //'create' => Pages\CreateAirline::route('/create'),
            'view' => Pages\ViewAirline::route('/{record}'),
            //'edit' => Pages\EditAirline::route('/{record}/edit'),
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
                Section::make('Detalles del cliente')
                    ->schema([
                        TextEntry::make('name')->label('Nombre'),
                        TextEntry::make('ruc')->label('RUC'),
                        TextEntry::make('email')->label('Correo'),
                        TextEntry::make('phone')->label('Telefono'),
                        TextEntry::make('web')->label('Sitio web'),
                        ImageEntry::make('logo')->label('Logo')
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
                Section::make('Información legal')
                    ->schema([
                        TextEntry::make('legal_name')->label('Nombre legal'),
                        TextEntry::make('legal_address')->label('Direccion legal'),
                    ])
                    ->columns(2),
                Section::make('Información de contacto')
                    ->schema([
                        TextEntry::make('contact_email')->label('Correo de contacto'),
                        TextEntry::make('contact_phone')->label('Telefono de contacto'),
                    ])
                    ->columns(2),
            ]);
    }
}
