<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientForm extends Form
{
    public ?User $patient;

    public $name;

    public $email;

    public function setPatient(User $patient)
    {
        $this->patient = $patient;
        $this->name = $patient->name;
        $this->email = $patient->email;
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            
        ]);

        $validated['password'] = Hash::make(fake()->password);
       
        $user = User::create($validated);
        $user->assignRole('patient');

        $this->reset();
    }
 
    public function update()
    {
      
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->patient->id,
        ]);

        $this->patient->update(
            $this->all()
        );
    }
}
