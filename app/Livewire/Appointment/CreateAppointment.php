<?php

namespace App\Livewire\Appointment;

use App\Enums\AppointmentDuration;
use App\Enums\AppointmentStatus;
use App\Livewire\Forms\AppointmentForm;
use App\Models\User;
use Livewire\Component;

class CreateAppointment extends Component
{
    public AppointmentForm $form;

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

    public function getHours(): array
    {
        $hours = [];
        $time = strtotime('09:00:00');
        while($time <= strtotime('18:00:00')) {
            $hours[] = date('H:i', $time);
            $time = strtotime('+15 minutes', $time);
        }
        return $hours;
    }
}
