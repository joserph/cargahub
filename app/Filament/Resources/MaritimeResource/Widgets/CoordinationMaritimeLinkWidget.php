<?php

namespace App\Filament\Resources\MaritimeResource\Widgets;

use App\Models\Maritime;
use Filament\Widgets\Widget;

class CoordinationMaritimeLinkWidget extends Widget
{
    protected static string $view = 'filament.resources.maritime-resource.widgets.coordination-maritime-link-widget';

    public Maritime $record;

    public function mount(Maritime $record)
    {
        $this->record = $record;
    }
}
