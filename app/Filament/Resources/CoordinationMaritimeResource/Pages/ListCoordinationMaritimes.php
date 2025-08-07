<?php

namespace App\Filament\Resources\CoordinationMaritimeResource\Pages;

use App\Filament\Resources\CoordinationMaritimeResource;
use App\Models\Maritime;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCoordinationMaritimes extends ListRecords
{
    protected static string $resource = CoordinationMaritimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalHeading('Crear item de coordinacion')
                ->modalWidth('7xl')
                ->mountUsing(function ($form) {
                    $referer = request()->header('Referer');
                    $parsedUrl = parse_url($referer);
                    parse_str($parsedUrl['query'] ?? '', $queryParams);

                    $maritimeId = $queryParams['maritime'] ?? null;
                    // dd($maritimeId);

                    $form->fill([
                        'maritime_id' => $maritimeId,
                        'user_id' => auth()->id(),
                        'user_update' => auth()->id(),
                        'fb' => 0,
                        'hb' => 0,
                        'qb' => 0,
                        'eb' => 0,
                        'db' => 0,
                    ]);
                })
                ->mutateFormDataUsing(function (array $data): array {
                    // Ya no necesitas tomar maritime_id aquí si lo pasaste arriba
                    // $data['user_id'] = auth()->id();
                    // $data['user_update'] = auth()->id();
                    return $data;
                })
        ];
    }

    // protected function getTableQuery(): Builder
    // {
    //     // Obtiene el parámetro "maritime" de la URL (como ?maritime=1)
    //     $referer = request()->header('Referer');
    //     $part = explode('/', $referer);
    //     $oldValue = end($part);

    //     $maritimeId = intval($oldValue);
    //     // dd($maritimeId);

    //     // Si hay un ID, filtra. Si no, muestra todo.
    //     return parent::getTableQuery()
    //         ->when($maritimeId, function (Builder $query, $maritimeId) {
    //             $query->where('maritime_id', $maritimeId);
    //         });
    // }
}
