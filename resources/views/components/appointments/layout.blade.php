<div class="">
    <div class="flex justify-end">
        <div class="ml-5 p-4">

            <flux:navbar>
                <flux:navbar.item :href="route('appointments')" wire:navigate>{{ __('List Appointments') }}</flux:navbar.item>
                <flux:navbar.item :href="route('appointments.create')" wire:navigate>{{ __('Create appointment') }}</flux:navbar.item>
                </flux:navlist>
        </div>
    </div>

    <flux:heading>{{ $heading ?? '' }}</flux:heading>

    <div class="flex w-full">

        {{ $slot }}

    </div>
</div>