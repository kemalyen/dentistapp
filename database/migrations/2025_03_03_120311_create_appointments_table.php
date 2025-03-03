<?php

use App\Enums\AppointmentStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'patient_id')->constrained();
            $table->foreignIdFor(User::class,'doctor_id')->constrained();
            $table->datetime('date');
            $table->enum('status', array_column(AppointmentStatus::cases(), 'value'))->default(AppointmentStatus::PENDING);
            $table->string('reason')->nullable();
            $table->string('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
 