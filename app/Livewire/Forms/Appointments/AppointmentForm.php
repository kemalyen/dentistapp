<?php

namespace App\Livewire\Forms\Appointments;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Appointment;
use App\Models\User;

class AppointmentForm extends Form
{ 
    public $status;
 
    public $date;
 
    public $doctor_id;
 
    public $patient_id;

    public function store()
    {
        $validated = $this->validate([
            'status' => 'required',
            'date' => 'required',
            'doctor_id' => [
                'required',
                'exists:users,id',
                //'is_doctor' => (bool)User::find($this->doctor_id)?->hasRole('doctor'),
            ],
            'patient_id' => [
                'required',
                'exists:users,id',
                //'is_patient' => (bool)User::find($this->patient_id)?->hasRole('patient'),
            ],
        ]);

        Appointment::create($this->all());

        $this->reset();
    }
}
