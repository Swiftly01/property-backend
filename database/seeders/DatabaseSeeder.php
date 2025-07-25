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
        $users = [
            ['name' => 'Test user', 'email' => 'test@example.com'],
            ['name' => 'admin', 'email' => 'kareemkazeem100@gmail.com'],
        ];

      
        foreach ($users as $user){
            User::factory()->create($user);

        }
        
        /*
        $this->call([
            SellRequestSeeder::class
        ]);
        */
    }
}
