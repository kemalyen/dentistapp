<section class="w-full ">
    <x-appointments.layout :heading="__('List All Appointment')" :subheading="__('')">
        <div class="w-full">
            <livewire:appointment-table :is_dashboard=false />
        </div>
    </x-appointments.layout>
</section>