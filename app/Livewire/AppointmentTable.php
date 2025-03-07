<?php

namespace App\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Responsive;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;


final class AppointmentTable extends PowerGridComponent
{
    public string $tableName = 'appointment-table-jkvsck-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()->showSearchInput(),

            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),

        ];
    }

    public function datasource(): Builder
    {
        return Appointment::query()->with('patient', 'doctor')->orderBy('created_at', 'desc');
    }

    public function relationSearch(): array
    {
        return [
            'doctor' => [ // relationship on dishes model
                'name', // column enabled to search
            ],
            'patient' => [ // relationship on dishes model
                'name', // column enabled to search
            ],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('created_at_formatted', fn(Appointment $model) => Carbon::parse($model->date)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Patient Name', 'patient_name')->searchable(),
            Column::make('Doctor Name', 'doctor_name')->searchable(),
            Column::make('Date', 'date', 'created_at_formatted'),
            Column::make('Status', 'status'),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('created_at'),
        ];
    }

 
    public function actions(Appointment $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('appointments.update', ['appointment' => $row->id], ''),
        ];
    }
 
}
