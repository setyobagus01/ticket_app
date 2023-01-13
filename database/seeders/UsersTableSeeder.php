<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $owner = User::create([
            'name' => 'Owner',
            'email' => 'owner@main.com',
            'password' => Hash::make('admin123'),
            'remember_token' => NULL,

            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@main.com',
            'password' => Hash::make('admin123'),
            'remember_token' => NULL,

            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        $ticket_in = User::create([
            'name' => 'Petugas 1',
            'email' => 'ticket_in@main.com',
            'password' => Hash::make('admin123'),
            'remember_token' => NULL,

            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        $ticket_out = User::create([
            'name' => 'Petugas 2',
            'email' => 'ticket_out@main.com',
            'password' => Hash::make('admin123'),
            'remember_token' => NULL,

            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);

        $owner->assignRole('owner');
        $admin->assignRole('admin');
        $ticket_in->assignRole('ticket_in');
        $ticket_out->assignRole('ticket_out');
    }
}
