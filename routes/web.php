<?php

use App\Livewire\Appointment\ListAppointsments;
use App\Livewire\Patient\ListPacients;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    
     
    Route::get('patients', ListPacients::class)->name('patients');    
    Route::get('appointments', ListAppointsments::class)->name('appointments'); 

    Volt::route('appointments/create', 'appointments.create')->name('appointments.create');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
