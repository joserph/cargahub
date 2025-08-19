<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaritimeResource\Pages;
use App\Filament\Resources\MaritimeResource\Pages\CoordinationMaritimePage;
use App\Filament\Resources\MaritimeResource\RelationManagers;
use App\Models\Maritime;
use App\Services\MaritimeForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class MaritimeResource extends Resource
{
    protected static ?string $model = Maritime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $maxContentWidth = 'full';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(MaritimeForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('shipment')->label('N°')->searchable(),
                TextColumn::make('date_year')
                ->label('Año')
                ->state(fn ($record) => $record->date ? Carbon::parse($record->date)->format('Y') : null),
                TextColumn::make('bl')->label('BL')->searchable()->copyable()
                ->copyMessage('Bl copied')
                ->copyMessageDuration(1500),
                TextColumn::make('logistic.name')->label('Agencia')->limit(15)->searchable(),
                TextColumn::make('date')->dateTime('d-m-Y')->label('Fecha Salida')->searchable(),
                TextColumn::make('arrival_date')->dateTime('d-m-Y')->label('Fecha Salida')->searchable(),
                TextColumn::make('thermographs.code')->label('Termografos')->copyable()
                ->copyMessage('Termografos copied')
                ->copyMessageDuration(1500),
                //TextColumn::make('authors.name')->listWithLineBreaks()->limitList(3)->expandableLimitedList(),
                TextColumn::make('thermographs_background')->label('Termógrafo Fondo')->getStateUsing(fn ($record) => $record->thermographs[0]->code . '-' . $record->thermographs[0]->brand)->badge()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('thermographs_door')->label('Termógrafo Puerta')->getStateUsing(fn ($record) => $record->thermographs[1]->code . '-' . $record->thermographs[1]->brand)->badge()->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar maritimo: {$record->bl}")
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
            'index' => Pages\ListMaritimes::route('/'),
            // 'create' => Pages\CreateMaritime::route('/create'),
            'view' => Pages\ViewMaritime::route('/{record}'),
            // 'edit' => Pages\EditMaritime::route('/{record}/edit'),
            'coordination' => CoordinationMaritimePage::route('/{record}/coordination'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            \App\Filament\Resources\MaritimeResource\Widgets\CoordinationMaritimeLinkWidget::class
        ];
    }
}
