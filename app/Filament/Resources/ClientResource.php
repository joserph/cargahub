<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use App\Services\ClientForm;
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

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $modelLabel = 'Cliente';
    protected static ?string $pluralLabel = 'Clientes';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(ClientForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('marketers.name')->label('Camercializadoras')->searchable(),
                TextColumn::make('type_load')->label('Tipo de Carga')->searchable(),
                IconColumn::make('status')->label('Estatus')->boolean(),
                TextColumn::make('owners.owner')->label('Propietarios')->searchable(),
                TextColumn::make('phones.phone')->label('Teléfono')->icon('heroicon-m-phone')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('emails.email')->label('Correo')->icon('heroicon-m-envelope')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('poa')->label('POA')->boolean()->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('state.name')->label('Estado')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('city.name')->label('Ciudad')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('address')->label('Direccion')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('zip_code')->label('ZIP CODE')->sortable()
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
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Client $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles del cliente')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Client $record) {
                        return view('filament.clients.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar cliente: {$record->name}")
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            // 'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}/view'),
            // 'edit' => Pages\EditClient::route('/{record}/edit'),
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
                        TextEntry::make('type_load')->label('Tipo de Carga')->badge(),
                        TextEntry::make('marketers.name')->label('Comercializadoras'),
                        TextEntry::make('phones.phone')->label('Telefonos'),
                        TextEntry::make('emails.email')->label('Correos')->icon('heroicon-m-envelope'),
                        TextEntry::make('owners.owner')->label('Propietarios'),
                        IconEntry::make('poa')
                        ->label('POA')
                        ->icon(fn (string $state): string => match ($state) {
                            '1' => 'heroicon-o-check-circle',
                            '0' => 'heroicon-o-x-circle',
                        })->color(fn (string $state): string => match ($state) {
                            '1' => 'success',
                            '0' => 'danger',
                        }),
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
                        TextEntry::make('zip_code')->label('ZIP CODE'),
                    ])
                    ->columns(4),
            ]);
    }
}
