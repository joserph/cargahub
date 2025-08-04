<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoordinationMaritimeResource\Pages;
use App\Filament\Resources\CoordinationMaritimeResource\RelationManagers;
use App\Models\CoordinationMaritime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoordinationMaritimeResource extends Resource
{
    protected static ?string $model = CoordinationMaritime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        if($maritimeId = request()->get('maritime_id')){
            $query->where('maritime_id', $maritimeId);
        }
        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListCoordinationMaritimes::route('/'),
            'create' => Pages\CreateCoordinationMaritime::route('/create'),
            'edit' => Pages\EditCoordinationMaritime::route('/{record}/edit'),
            'by-maritime' => Pages\CoordinationByMaritime::route('/by-maritime/{maritime}')
        ];
    }
}
