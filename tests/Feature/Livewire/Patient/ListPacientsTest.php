<?php

use App\Livewire\Patient\ListPacients;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ListPacients::class)
        ->assertStatus(200);
});
