<?php

namespace App\Livewire\Patient;

use App\Livewire\Forms\PatientForm;
use App\Models\User;
use Livewire\Component;

class UpdatePatient extends Component
{
    public PatientForm $form;

    public function mount(User $patient)
    {
        $this->form->setPatient($patient);
    }

    public function save()
    {
 
        $this->form->update();
 
        return $this->redirect('/patients');
    }

    public function render()
    {
        return view('livewire.patient.form');
    }
}
