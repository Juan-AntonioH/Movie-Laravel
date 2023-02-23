<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ActorSeeder;
use Database\Seeders\MovieSeeder;
use Database\Factories\UserFactory;
use Database\Seeders\DirectorSeeder;
use Database\Seeders\ActorMovieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(ActorMovieSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
