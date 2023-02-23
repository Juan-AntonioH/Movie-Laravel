<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = Director::all();
        $directors->each(function ($director) {
            Movie::factory()->count(3)->create([
                'director_id' => $director->id
            ]);
        });
    }
}
