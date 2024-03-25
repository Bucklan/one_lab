<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models as Models;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'client',
            'manager',
            'admin'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
//        Models\User::factory(50)->create();

        Models\User::create([
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.kz',
//                'password' => bcrypt('admin123'),
                'role_id' => Role::where('name', 'admin')->first()->id
            ]);
    }
}
