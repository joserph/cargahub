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


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                TextInput::make('scientific_name')
                    ->maxLength(255)
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
            ]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        dd('algo');
        $data['updated_by'] = auth()->id();
        $record->update($data);

        return $record;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scientific_name')
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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->modalHeading('Nuevo Proyecto')
                    ->mutateFormDataUsing(function (array $data): array {
                        dd('algo1');
                        $data['user_id'] = auth()->id();
                
                        return $data;
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //'create' => Pages\CreateVariety::route('/create'),
            'edit' => Pages\EditVariety::route('/{record}/edit'),
        ];
    }
}
