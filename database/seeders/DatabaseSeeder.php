<?php

namespace Database\Seeders;

use App\Models\Appointment;
 
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create(); 

        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'patient']);

        $users = User::factory(6)->user()->create();
        $patients = User::factory(100)->patient()->create();


        for ($i = 0; $i < 1000; $i++) {
            Appointment::factory()->create(['patient_id' => $patients->random()->id, 'doctor_id' => $users->random()->id]);
            $i++;
        }

        User::factory()->admin()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
