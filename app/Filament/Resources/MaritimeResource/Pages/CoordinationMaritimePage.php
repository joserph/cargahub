<?php

namespace App\Filament\Resources\MaritimeResource\Pages;

use App\Filament\Resources\MaritimeResource;
use App\Models\CoordinationMaritime;
use App\Models\Maritime;
use App\Models\Variety;
use App\Services\CoordinationMaritimeForm;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Concerns\CanUseActions;
use Filament\Pages\Actions\Action;

class CoordinationMaritimePage extends Page
{
    protected static string $resource = MaritimeResource::class;

    protected static string $view = 'filament.resources.maritime-resource.pages.coordination-maritime-page';
    protected ?string $maxContentWidth = 'full';

    public Maritime $record;
    public $varieties;

    public function mount(Maritime $record): void
    {
        
        $this->record = $record;
        $this->varieties = Variety::get();
        // $this->clientsCoord = CoordinationMaritime::where('maritime_id', $this->record->id)
        //     ->join('clients', 'coordination_maritimes.client_id', '=', 'clients.id')
        //     ->select('clients.id', 'clients.name')
        //     ->distinct()
        //     ->orderBy('clients.name', 'ASC')
        //     ->get();
        // $this->coordinations = CoordinationMaritime::select('*')
        //     ->where('maritime_id', '=', $this->record->id)
        //     ->join('farms', 'coordination_maritimes.farm_id', '=', 'farms.id')
        //     ->select('farms.name', 'coordination_maritimes.*')
        //     ->orderBy('farms.name', 'ASC')
        //     ->get();
        //dd($this->coordinations);
    }

    public static function getRouteName(?string $panel = null): string
    {
        return static::getResource()::getRouteBaseName($panel) . '.coordination';
    }

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Coordinaciones contenedor ' . $this->record->bl;;
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('agregarCoordinacion')
                ->label('Agregar Coordinación')
                ->form(CoordinationMaritimeForm::schema())
                ->action(function (array $data) {
                    // Aquí puedes guardar la información
                    
                    CoordinationMaritime::create([
                        'maritime_id' => $this->record->id,
                        ...$data,
                    ]);

                    $this->dispatch('notify', type: 'success', message: '¡Coordinación guardada!');
                })
                ->after(fn () => $this->dispatch('$refresh'))
                ->modalHeading('Item Coordinación Marítima')
                ->modalWidth('7xl'),
        ];
    }
    public function getItemsProperty()
    {
        return CoordinationMaritime::query()
            ->with('client')
            ->orderBy('client_id')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy(fn($item) => $item->client->name ?? 'Sin cliente');
    }

    public function getClientsCoordProperty()
    {
        return CoordinationMaritime::where('maritime_id', $this->record->id)
            ->join('clients', 'coordination_maritimes.client_id', '=', 'clients.id')
            ->select('clients.id', 'clients.name')
            ->distinct()
            ->orderBy('clients.name', 'ASC')
            ->get();
    }

    public function getCoordinationsProperty()
    {
        return CoordinationMaritime::select('*')
            ->where('maritime_id', '=', $this->record->id)
            ->join('farms', 'coordination_maritimes.farm_id', '=', 'farms.id')
            ->select('farms.name', 'coordination_maritimes.*')
            ->orderBy('farms.name', 'ASC')
            ->get();
    }


}
