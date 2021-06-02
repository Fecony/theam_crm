<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        // Make sure we have at least 1 admin user for testing
        User::factory()->create([
            'is_admin' => true
        ]);
    }
}
