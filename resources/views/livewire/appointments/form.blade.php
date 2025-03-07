 <x-appointments.layout :heading="__('Manage Appointment')" :subheading="__('')">

     <form wire:submit="save" class="my-6 w-full space-y-6 m-5">
         <flux:field>
             <flux:label>Doctor</flux:label>
             <flux:select wire:model="form.doctor_id" placeholder="Choose a doctor...">
             <flux:select.option value=""> Choose a doctor ...</flux:select.option>
                 @foreach($doctors as $doctor)
                 <flux:select.option value="{{ $doctor->id }}">{{ $doctor->name }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.doctor_id" />
         </flux:field>

         <flux:field>
             <flux:label>Patient</flux:label>

             <flux:select wire:model="form.patient_id" placeholder="Choose a patient...">
             <flux:select.option value=""> Choose a patient ...</flux:select.option>
                 @foreach($patients as $patient)
                 <flux:select.option value="{{ $patient->id }}">{{ $patient->name }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.patient_id" />
         </flux:field>

         <flux:field>
             <flux:label>Date</flux:label>

             <flux:input wire:model="form.starts_at" type="date" format="Y-m-d" />

             <flux:error name="form.starts_at" />
         </flux:field>


         <flux:field>
             <flux:label>Time</flux:label>
             <flux:select wire:model="form.time">
               <flux:select.option value=""> Choose a time...</flux:select.option>
                 @foreach($times as $time_value)
                 <flux:select.option value="{{ $time_value }}">{{ $time_value }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.time_value" />
         </flux:field>


         <flux:field>
             <flux:label>Duration</flux:label>
             <flux:select wire:model="form.duration">
               <flux:select.option value=""> Choose a duration...</flux:select.option>
                 @foreach($durations as $duration_value)
                 <flux:select.option value="{{ $duration_value }}">{{ $duration_value }}</flux:select.option>
                 @endforeach
             </flux:select>

             <flux:error name="form.duration" />
         </flux:field>


         <flux:field>
             <flux:label>Status</flux:label>
             <flux:select wire:model="form.status">
               <flux:select.option value=""> Choose a status...</flux:select.option>
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