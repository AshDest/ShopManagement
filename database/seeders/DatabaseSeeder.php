<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        // $this->call(AdminSeeder::class);


        // pour executer tout les Seeds on  tape : php artisan db:seed en cas d'erreur  taper php artisan db:seed --force
        //pour executer un seed specifique on  tape : php artisan db:seed --class=NomDeVotreSeeder ex: php artisan db:seed --class=RoleSeeder

        // pour creer un seeder php artisan make:seeder NomDeVotreSeeder

    }
}
