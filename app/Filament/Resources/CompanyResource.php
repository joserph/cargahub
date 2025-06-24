<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use App\Services\CompanyForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $modelLabel = 'Empresa';
    protected static ?string $pluralLabel = 'Empresa';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(CompanyForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->circular()->disk('public')->height(40),
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('email')->label('Correo')->searchable(),
                TextColumn::make('phone')->label('Teléfono')->searchable(),
                TextColumn::make('web')->label('Sitio Web')->searchable(),
                TextColumn::make('legal_name')->label('Nombre Legal')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('legal_address')->label('Dirección Legal')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('contact_email')->label('Correo de contacto')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('contact_phone')->label('Teléfono de contacto')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('country.name')->label('Pais')->sortable()
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
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Action::make('verDetalle')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->action(fn (Company $record, array $data) => null) // no necesitas lógica aquí
                    ->modalHeading('Detalles de la empresa')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->modalContent(function (Company $record) {
                        return view('filament.company.modal-details', ['record' => $record]);
                    }),
                Tables\Actions\EditAction::make()
                ->modalHeading(fn ($record) => "Editar empresa: {$record->name}")
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_update'] = auth()->id();
            
                    return $data;
                })->modalWidth('7xl'),
            ])
            ->bulkActions([
                
            ]);
    }

    public static function canViewAny(): bool
    {
        return true; // Oculta la vista de lista
    }

    public static function canCreate(): bool
    {
        return false; // Evita creación de nuevos registros
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
            'index' => Pages\ListCompanies::route('/'),
            // 'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            // 'edit' => Pages\EditCompany::route('/{record}/edit'),
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
                        TextEntry::make('zip_code')->label('ZIP CODE'),
                    ])
                    ->columns(4),
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
