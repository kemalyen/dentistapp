 <x-appointments.layout :heading="__('Create a new Appointment')" :subheading="__('')">


     <form wire:submit="save" class="my-6 w-full space-y-6">

         <flux:field>
             <flux:label>Doctor</flux:label>
             <flux:select wire:model="form.doctor_id" placeholder="Choose a doctor...">

                 @foreach($doctors as $doctor)
                 <flux:select.option value="{{ $doctor->id }}">{{ $doctor->name }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.doctor_id" />
         </flux:field>

         <flux:field>
             <flux:label>Patient</flux:label>

             <flux:select wire:model="form.patient_id" placeholder="Choose a patient...">

                 @foreach($patients as $patient)
                 <flux:select.option value="{{ $patient->id }}">{{ $patient->name }}</flux:select.option>
                 @endforeach
                 <flux:select.option value="{{ '4010' }}">{{ 'testt' }}</flux:select.option>
             </flux:select>

             <flux:error name="form.patient_id" />
         </flux:field>

         <flux:field>
             <flux:label>Date</flux:label>

             <flux:input wire:model="form.date" type="datetime-local" />

             <flux:error name="form.date" />
         </flux:field>

         <flux:field>
             <flux:label>Status</flux:label>
             <flux:select wire:model="form.status" placeholder="Choose a status...">

                 @foreach($status as $status_value)
                 <flux:select.option value="{{ $status_value }}">{{ $status_value }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.status" />
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