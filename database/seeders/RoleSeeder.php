<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create(['name' => 'writer']);
        $role = Role::create(['name' => 'admin']); // admin
        $role = Role::create(['name' => 'manager']); // gestionnaire
        $role = Role::create(['name' => 'seler']); // vendeur
        $role = Role::create(['name' => 'user']); // utilisateur simple
    }
}
