<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Amri Marihot',
            'email' => 'amrimarihotjati@gmail.com',
            'password' => 'devforkuissaldo123A@',
            'role' => 'superadmin'
        ]);

        User::factory()->create([
            'name' => 'Sani As Jounin',
            'email' => 'jounintechnology.developer@gmail.com',
            'password' => 'devforkuissaldo123A@',
            'role' => 'superadmin'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'baseadmin.kuissaldo@gmail.com',
            'password' => 'adminforkuissaldo123A',
            'role' => 'user'
        ]);
    }
}
