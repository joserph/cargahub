<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function afterCreate(): void
    {
        //$user = $this->record;
        $recipient = auth()->user();

        Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);
        //dd($user);
        /* Notification::make()
        ->title('Usuario nuevo')
        ->body("Se creo el usuarion {$user->name} en el sistema")
        ->actions([
            Action::make('View')->url(
                UserResource::getUrl('edit', ['record' => $user])
            ),
        ])
        ->sendToDatabase(auth()->user()); */
    }
    
}

