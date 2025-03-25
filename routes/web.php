<?php

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    $recipient = auth()->user();

$recipient->notify(
    Notification::make()
        ->title('Saved successfully')
        ->toDatabase(),
);

    dd('Enviada');
})->middleware('auth');