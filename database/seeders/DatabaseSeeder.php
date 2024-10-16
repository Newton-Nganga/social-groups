<?php

namespace Database\Seeders;

use App\Models\Analytics;
use App\Models\Groups;
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
        $this->call(AdminSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Groups::factory(20)->create();
        //analytics seeder
        Analytics::factory(10)->create();
    }
}
