<div class="">
    <div class="flex justify-end">
        <div class="ml-5 p-4">

            <flux:navbar>
                <flux:navbar.item :href="route('patients')" wire:navigate>{{ __('List patients') }}</flux:navbar.item>
                <flux:navbar.item :href="route('patients.create')" wire:navigate>{{ __('Create patient') }}</flux:navbar.item>
                </flux:navlist>
        </div>
    </div>


    <div class="flex w-full">
  
         
            {{ $slot }}
        
    </div>
</div>