<?php

// UserSeeder.php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Generate 50 user records.
        User::factory()->count(10)->create();
    }
}