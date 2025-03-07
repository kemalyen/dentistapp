<?php

namespace App\Livewire\Forms;

use App\Enums\AppointmentDuration;
use Livewire\Form;
use App\Models\Appointment;
use App\Models\User;
use App\Rules\AppointmentAvailability;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AppointmentForm extends Form
{
    public ?Appointment $appointment;

    public $status;

    public $starts_at;

    public $ends_at;

    public $time;

    public $duration;

    public $doctor_id;

    public $patient_id;

    public function setAppointment(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->status = $appointment->status;
        $this->starts_at = $appointment->starts_at;
        $this->duration = $appointment->duration;
        $this->doctor_id = $appointment->doctor_id;
        $this->patient_id = $appointment->patient_id;
    }

    public function store()
    {
        $this->validate([
            'status' => 'required',
            'starts_at' => 'required|date|after:today',
            'duration' => [
                'required', new AppointmentAvailability($this->starts_at, $this->time, $this->duration, $this->doctor_id)],
            'doctor_id' => [
                'required',
                'exists:users,id',
            ],
            'patient_id' => [
                'required',
                'exists:users,id',
            ],
            
        ]);

        $starts_at = Carbon::createFromFormat('Y-m-d H:i', ($this->starts_at . ' '. $this->time));
        $ends_at = $starts_at->copy()->addMinutes(AppointmentDuration::duration($this->duration));

        Appointment::create([
            'status' => $this->status,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id
            
        ]);

        //$this->reset();
    }

    public function update()
    {
        Log::info('update' . $this->date);
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
