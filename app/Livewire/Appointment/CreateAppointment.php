<?php

namespace App\Livewire\Appointment;

use App\Enums\AppointmentDuration;
use App\Enums\AppointmentStatus;
use App\Livewire\Forms\AppointmentForm;
use App\Models\User;
use Faker\Provider\Base;

class CreateAppointment extends BaseComponent
{
    public AppointmentForm $form;

    public $show = false;

    public function save()
    {
        $this->form->store(); 
 
        //return $this->redirect('/appointments');
    }

    public function render()
    {
        $doctors = User::role('doctor')->get();
        $patients = User::role('patient')->get();
        $status = array_column(AppointmentStatus::cases(), 'value');
        $durations = AppointmentDuration::cases();
        $times = $this->getHours();
        return view('livewire.appointments.form', [
            'doctors' => $doctors,
            'patients' => $patients,
            'status' => $status,
            'durations' => $durations,
            'times' => $times
        ]);
    }

}
