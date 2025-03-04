<?php

use App\Enums\AppointmentStatus;
use Illuminate\Support\Facades\App;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use function Livewire\Volt\{layout, state, title};
use App\View\Components\SearchableDropdown;
 

new class extends Component {


    public array $status;

    #[Title('Create a new Appointment')]
    public function mount(): void
    {
        $this->status = array_column(AppointmentStatus::cases(), 'value');
    }
    public function createAppointment(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // Create the appointment...
    }
}; ?>

<section class="w-full">



    <x-appointments.layout :heading="__('Create a new Appointment')" :subheading="__('')">
        <form wire:submit="createAppointment" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" name="name" required autofocus autocomplete="name" />

           


            <flux:field>
                <flux:label>Choose doctor:</flux:label>
                
                <x-\searchable-dropdown   property="property_name" />
                <flux:error name="doctor" />
            </flux:field>


            <flux:field>
                <flux:label>Date</flux:label>
                <flux:input wire:model="date" type="datetime-local" />
                <flux:error name="date" />
            </flux:field>

            <flux:field>
                <flux:label>Date</flux:label>
                <flux:select wire:model="status">
                    @foreach ($status as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </flux:select>
            </flux:field>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

    </x-appointments.layout>
</section>