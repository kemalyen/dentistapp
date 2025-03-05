<?php

namespace App\Livewire\Appointment;

use App\Enums\AppointmentStatus;
use App\Livewire\Forms\AppointmentForm;
use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class UpdateAppointment extends Component
{
    public AppointmentForm $form;

    public function mount(Appointment $appointment)
    {
        $this->form->setAppointment($appointment);
    }

    public function save()
    {
        $this->form->update();
 
        return $this->redirect('/appointments');
    }
 

    public function render()
    {
        $doctors = User::role('doctor')->get();
        $patients = User::role('patient')->get();
        $status = array_column(AppointmentStatus::cases(), 'value');
        return view('livewire.appointments.form', [
            'doctors' => $doctors,
            'patients' => $patients,
            'status' => $status
        ]);
    }
}
