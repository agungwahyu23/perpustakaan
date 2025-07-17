<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '08888190',
            'address' => 'Jl. Mawar 001',
            'date_join' => Carbon::now()->format('Y-m-d'),
        ]);

        for ($i = 1; $i <= 14; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'),
                'phone' => '08888190' . $i,
                'address' => 'Jl. Mawar 001' . $i,
                'date_join' => Carbon::now()->format('Y-m-d'),
            ]);
        }
    }
}
