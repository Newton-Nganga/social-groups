<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Digital world',
            'email' => 'admin@social-groups.com',
            'password' => Hash::make('password'), 
        ]);
    }
}
