<?php

namespace App\Livewire\Forms; 
use Livewire\Form;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AppointmentForm extends Form
{ 

    public ?Appointment $appointment;
 
    public $status;
 
    public $date;
 
    public $doctor_id;
 
    public $patient_id;

    public function setAppointment(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->status = $appointment->status;
        $this->date = $appointment->date;
        $this->doctor_id = $appointment->doctor_id;
        $this->patient_id = $appointment->patient_id;
    }

    public function store()
    {
       $this->validate([
            'status' => 'required',
            'date' => 'required|date_format:Y-m-d\TH:i|after:today',
            'doctor_id' => [
                'required',
                'exists:users,id',
            ],
            'patient_id' => [
                'required',
                'exists:users,id',
            ],
        ]);

        Appointment::create($this->all());

        $this->reset();
    }
 
    public function update()
    {
        Log::info('update'. $this->date);
        $this->validate([
            'status' => 'required',
            'date' => 'required|date_format:Y-m-d\TH:i|after:today',
            'doctor_id' => [
                'required',
                'exists:users,id',
            ],
            'patient_id' => [
                'required',
                'exists:users,id',
            ],
        ]);
 
        $this->appointment->update(
            $this->all()
        );
    }
}
