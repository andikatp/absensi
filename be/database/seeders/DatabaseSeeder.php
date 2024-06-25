<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Andika Admin',
            'email' => 'andika@admin.com',
            'password' => Hash::make('12345678'),
            'role'=> 'admin',
            'position'=> 'Flutter Developer',
            'department'=> 'IT',
            'phone' => '082366949979'
        ]);

        //dummy for company
        \App\Models\Company::create([
            'name' => 'PT. Andika Company',
            'email' => 'andika@company.com',
            'address' => 'jl. Tak tau',
            'latitude'=> '-7.747033',
            'longitude' => '110.355398',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out'=>'17:00'
        ]);

        $this->call([
            AttendanceSeeder::class,
        ]);
    }
}
