<?php

namespace App\Livewire\Patient;

use App\Livewire\Forms\PatientForm;
use Livewire\Component;

class CreatePatient extends Component
{
    public PatientForm $form;

    public function save()
    {
        $this->form->store(); 
 
        return $this->redirect('/patients');
    }

    public function render()
    {
        return view('livewire.patient.form');
    }
}
