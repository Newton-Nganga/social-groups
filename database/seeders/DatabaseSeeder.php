<?php

namespace Database\Seeders;

use App\Models\Analytics;
use App\Models\FacebookGroup;
use App\Models\Groups;
use App\Models\Investment;
use App\Models\TelegramGroup;
use App\Models\User;
use App\Models\WhatsAppGroup;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();use \App\Models\User;

        $this->call(AdminSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Groups::factory(20)->create();
        //analytics seeder
        Analytics::factory(10)->create();
        // investments
        Investment::factory(10)->create();
        // Telegram
        TelegramGroup::factory(10)->create();

        FacebookGroup::factory(10)->create();
        WhatsAppGroup::factory(10)->create();



    }
}
