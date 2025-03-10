<?php

namespace App\Livewire\Appointment;

use App\Enums\AppointmentDuration;
use App\Enums\AppointmentStatus;
use App\Livewire\Forms\AppointmentForm;
use App\Models\Appointment;
use App\Models\User;

class UpdateAppointment extends BaseComponent
{
    public AppointmentForm $form;

    public $show = false;

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
        $times = $this->getHours();
        $durations = AppointmentDuration::cases();
        $status = array_column(AppointmentStatus::cases(), 'value');
        return view('livewire.appointments.form', [
            'doctors' => $doctors,
            'patients' => $patients,
            'status' => $status,
            'times' => $times,
            'durations' => $durations,
           
        ]);
    }
}
