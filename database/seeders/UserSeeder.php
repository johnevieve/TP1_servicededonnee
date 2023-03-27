<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://laravel.com/docs/10.x/eloquent-factories#factory-relationships

        User::firstOrCreate(['email' => 'gabriel@email.com '], [
            'name' => 'Gabriel T. St-Hilaire',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory()
            ->count(9)
            ->create();
    }
}
