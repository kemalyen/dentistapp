<?php

use Livewire\Volt\Component;

new class extends Component {
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

