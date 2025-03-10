<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'starts_at',
        'ends_at',
        'reason',
        'notes',
        'patient_id',
        'doctor_id',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
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

    protected function startsAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->starts_at)->format('d/m/Y H:i'),
        );
    }

    protected function endsAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->ends_at)->format('d/m/Y H:i'),
        );
    }
}
