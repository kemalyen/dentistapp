<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'date',
        'reason',
        'notes',
        'patient_id',
        'doctor_id',
    ];

    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    protected function patientName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->patient?->name,
        );
    }

    protected function doctorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->doctor?->name,
        );
    }
}
