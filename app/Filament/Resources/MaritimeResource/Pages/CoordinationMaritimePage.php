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
    public $varieties, $totalTypeBox, $hb;

    public function mount(Maritime $record): void
    {
        
        $this->record = $record;
        $this->varieties = Variety::get();
        $this->totalTypeBox = Maritime::selectRaw('SUM(fb_status + hb_status + qb_status + eb_status + db_status) as total')->value('total');

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
        //dd($this->totalTypeBox);
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

    public function getHbTotalsProperty()
    {
        return CoordinationMaritime::query()
            ->where('maritime_id', $this->record->id)
            ->join('clients', 'clients.id', '=', 'coordination_maritimes.client_id')
            ->selectRaw('clients.id as client_id, 
                SUM(pieces) as total_pieces,
                SUM(fb) as total_fb, 
                SUM(hb) as total_hb, 
                SUM(qb) as total_qb, 
                SUM(eb) as total_eb, 
                SUM(db) as total_db,
                SUM(fulls) as total_fulls,
                SUM(pieces_r) as total_pieces_r,
                SUM(fb_r) as total_fb_r, 
                SUM(hb_r) as total_hb_r, 
                SUM(qb_r) as total_qb_r, 
                SUM(eb_r) as total_eb_r, 
                SUM(db_r) as total_db_r,
                SUM(fulls_r) as total_fulls_r')
            ->groupBy('clients.id', 'clients.name')
            ->orderBy('clients.name')
            ->get()
            ->mapWithKeys(fn ($row) => [
                $row->client_id => [
                    'pieces'    => $row->total_pieces,
                    'fb'        => $row->total_fb,
                    'hb'        => $row->total_hb,
                    'qb'        => $row->total_qb,
                    'eb'        => $row->total_eb,
                    'db'        => $row->total_db,
                    'fulls'     => $row->total_fulls,
                    'pieces_r'    => $row->total_pieces_r,
                    'fb_r'        => $row->total_fb_r,
                    'hb_r'        => $row->total_hb_r,
                    'qb_r'        => $row->total_qb_r,
                    'eb_r'        => $row->total_eb_r,
                    'db_r'        => $row->total_db_r,
                    'fulls_r'     => $row->total_fulls_r
                ],
            ]);
    }





}
