<?php
namespace App\Livewire\Appointment;

use Livewire\Component;

class BaseComponent extends Component
{
    public function getHours(): array   
    {
        $hours = [];
        $time = strtotime('09:00:00');
        while($time <= strtotime('18:00:00')) {
            $hours[] = date('H:i', $time);
            $time = strtotime('+15 minutes', $time);
        }
        return $hours;
    }
}
