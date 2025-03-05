<?php
 
use App\Livewire\Appointment\CreateAppointment;
use App\Livewire\Appointment\ListAppointsments;
use App\Livewire\Appointment\UpdateAppointment;
use App\Livewire\Patient\CreatePatient;
use App\Livewire\Patient\ListPatients;
use App\Livewire\Patient\UpdatePatient;
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
    
 
    Route::get('patients', ListPatients::class)->name('patients');    
    Route::get('patients/create', CreatePatient::class)->name('patients.create'); 
    Route::get('patients/{patient}/update', UpdatePatient::class)->name('patients.update');   


    Route::get('appointments', ListAppointsments::class)->name('appointments'); 
    Route::get('appointments/create', CreateAppointment::class)->name('appointments.create'); 
    Route::get('appointments/{appointment}/update', UpdateAppointment::class)->name('appointments.update'); 

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
