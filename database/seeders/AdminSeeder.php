<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$O4AHekFfeGyOEcThU0hw.uDps8w2aseKftbVXfiSNxKQ7uZzoD3vi', // password:12345678
            'remember_token' => Str::random(10),
        ])->assignRole('writer', 'admin');
        // ou  $user->assignRole('writer', 'admin');
    }

    // 'name' => fake()->name(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //         'remember_token' => Str::random(10),
}