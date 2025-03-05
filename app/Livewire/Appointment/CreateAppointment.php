<?php

namespace App\Livewire\Appointment;

use App\Enums\AppointmentStatus;
use App\Livewire\Forms\Appointments\AppointmentForm;
use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class CreateAppointment extends Component
{

    public AppointmentForm $form;


    public function store()
    {
        $this->form->store(); 
 
        return $this->redirect('/appointments');
    }

    public function render()
    {
        $doctors = User::role('doctor')->get();
        $patients = User::role('patient')->get();
        $status = array_column(AppointmentStatus::cases(), 'value');
        return view('livewire.appointments.create', [
            'doctors' => $doctors,
            'patients' => $patients,
            'status' => $status
        ]);
    }
}
