<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PharmacySeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'pharmacien@hospital.com'],
            [
                'name' => 'Pharmacien',
                'password' => Hash::make('pharmacy123'),
                'role' => 'pharmacist',
            ]
        );
    }
}
