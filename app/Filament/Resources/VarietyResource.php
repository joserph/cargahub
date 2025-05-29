<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VarietyResource\Pages;
use App\Filament\Resources\VarietyResource\RelationManagers;
use App\Models\Variety;
use Filament\Pages\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class VarietyResource extends Resource
{
    protected static ?string $model = Variety::class;
    protected static ?string $modelLabel = 'Variedad';
    protected static ?string $pluralLabel = 'Variedades';
    protected static ?string $navigationIcon = 'heroicon-o-sun';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                TextInput::make('scientific_name')
                    ->label('Nombre Científico')
                    ->maxLength(255)
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scientific_name')
                    ->label('Nombre Científico')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->label('Creado por')
                    ->sortable(),
                Tables\Columns\TextColumn::make('userupdate.name')
                    ->label('Actualizado por')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Variety $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles de la variedad')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Variety $record) {
                        return view('filament.varieties.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar variedad: {$record->name}")
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_update'] = auth()->id();
            
                    return $data;
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
            'index' => Pages\ListVarieties::route('/'),
            // 'create' => Pages\CreateVariety::route('/create'),
            //'edit' => Pages\EditVariety::route('/{record}/edit'),
        ];
    }
}
