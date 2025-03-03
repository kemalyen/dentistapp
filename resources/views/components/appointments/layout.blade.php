<div class="">
    <div class="flex justify-end">
        <div class="ml-5 p-4">

            <flux:navbar>
                <flux:navbar.item :href="route('appointments')" wire:navigate>{{ __('List Appointments') }}</flux:navbar.item>
                <flux:navbar.item :href="route('appointments.create')" wire:navigate>{{ __('Create appointment') }}</flux:navbar.item>
                </flux:navlist>
        </div>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex  w-full ">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>