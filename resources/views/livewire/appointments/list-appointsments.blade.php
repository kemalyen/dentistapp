<div>
<x-appointments.layout :heading="__('Create a new Appointment')" :subheading="__('')">


<x-searchable-dropdown  property="property_name" />

    <livewire:appointment-table />
</x-appointments.layout>
</div>