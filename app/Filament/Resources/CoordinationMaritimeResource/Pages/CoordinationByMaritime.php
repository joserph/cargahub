<?php

namespace App\Filament\Resources\CoordinationMaritimeResource\Pages;

use App\Filament\Resources\CoordinationMaritimeResource;
use App\Models\Maritime;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;

class CoordinationByMaritime extends ListRecords
{
    protected static string $resource = CoordinationMaritimeResource::class;

    public ?Maritime $maritime = null;

    

    public function mount(): void
    {
        parent::mount();

        $id = request()->route('maritime');

        $this->maritime = Maritime::findOrFail($id);
    }

    

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['maritime_id'] = $this->maritime->id;
                    return $data;
                }),
            ];
    }

    protected function getTableQuery(): Builder
    {
        abort_unless($this->maritime, 404);

        return $this->maritime->coordinationMaritimes()->getQuery();
    }


    public function getTitle(): string
    {
        return $this->maritime
            ? "Coordinaciones de: {$this->maritime->name}"
            : 'Coordinaciones';
    }
}
