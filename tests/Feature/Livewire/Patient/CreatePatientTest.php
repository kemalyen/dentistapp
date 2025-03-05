<?php

use App\Livewire\Patient\CreatePatient;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreatePatient::class)
        ->assertStatus(200);
});
