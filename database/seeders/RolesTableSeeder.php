<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        Role::create([
            'name' => 'owner'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'ticket_in'
        ]);
        Role::create([
            'name' => 'ticket_out'
        ]);
    }
}
