<?php

use App\Livewire\Patient\UpdatePatient;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UpdatePatient::class)
        ->assertStatus(200);
});
