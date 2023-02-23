<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::all();

        // Populate the pivot table
        Actor::all()->each(function ($actor) use ($movies) {
            $actor->movie()->attach(
                $movies->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
