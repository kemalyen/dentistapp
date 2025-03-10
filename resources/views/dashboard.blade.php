<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <h3>Incoming Appointments</h3>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
              
            <livewire:appointment-table :is_dashboard=true />
        </div>
    </div>
</x-layouts.app>