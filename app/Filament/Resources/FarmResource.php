<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmResource\Pages;
use App\Filament\Resources\FarmResource\RelationManagers;
use App\Models\Farm;
use App\Services\FarmForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;

class FarmResource extends Resource
{
    protected static ?string $model = Farm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(FarmForm::schema())->columns([
                'default' => 1,
                'sm' => 2,
                'md' => 3,
                'lg' => 5,
                'xl' => 5,
                '2xl' => 5,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('ruc')->label('RUC')->searchable(),
                TextColumn::make('tradename')->label('Nombre Comercial')->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar finca: {$record->name}")
                ->modalWidth('7xl'),
                //Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                //Tables\Actions\ViewAction::make()->label('Ver detalles')->icon('heroicon-o-eye'),
                Action::make('verDetalle')
                    ->label('Ver Detalles')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Farm $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles del usuario')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Farm $record) {
                        return view('filament.farms.modal-details', ['record' => $record]);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFarms::route('/'),
            //'create' => Pages\CreateFarm::route('/create'),
            //'edit' => Pages\EditFarm::route('/{record}/edit'),
            //'view' => Pages\ViewFarm::route('/{record}/view'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detalles del Post')
                    ->schema([
                        TextEntry::make('title')->label('Título'),
                        TextEntry::make('content')->label('Contenido')->markdown(),
                        TextEntry::make('published_at')
                            ->label('Publicado el')
                            ->dateTime('d M Y H:i'),
                        //ImageEntry::make('image_url')->label('Imagen'),
                        TextEntry::make('author.name')->label('Autor'),
                    ])
                    ->columns(2),
            ]);
    }
}
