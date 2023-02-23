<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        $roles->each(function ($rol) {
            User::factory()->count(1)->create([
                'role_id' => $rol->id
            ]);
        });
        // User::factory()->count(2)->create();
    }
}
