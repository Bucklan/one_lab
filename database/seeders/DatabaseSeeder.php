<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models as Models;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         Models\User::factory(50)->create();
    }
}
