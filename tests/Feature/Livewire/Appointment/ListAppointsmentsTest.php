<?php

use App\Livewire\Appointment\ListAppointsments;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ListAppointsments::class)
        ->assertStatus(200);
});
