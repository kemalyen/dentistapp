<x-patients.layout :heading="__('Create a new Appointment')" :subheading="__('')">


<form wire:submit="save" class="my-6 w-full space-y-6 m-5">
 
    <flux:field>
        <flux:label>Email</flux:label>

        <flux:input wire:model="form.email" type="email"/>

        <flux:error name="form.email" />
    </flux:field>

    <flux:field>
        <flux:label>Name</flux:label>

        <flux:input wire:model="form.name" type="text"/>

        <flux:error name="form.name" />
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
</x-patients.layout>