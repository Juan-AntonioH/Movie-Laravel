<?php

namespace Src\DAO\impl;

use DB\orm\DB;
use App\Models\Movie;
use Src\DAO\MovieDAO;
use Src\DTO\ActorsDTO;
use Src\DTO\MoviesDTO;
use App\Models\Director;
use Illuminate\Http\Request;

class EloquentMovieDAO implements MovieDAO
{
    /**
     * @return array
     */
    public function all(): array
    {
        $result = array();
        $db_data = DB::table('movies')->select()->get();
        foreach ($db_data as $movie) {
            $result[] = new MoviesDTO(
                $movie->id,
                $movie->title,
                $movie->year,
                $movie->duration,
                $movie->director_id
            );
        }
        return $result;

        // $movies =  Movie::get()->toArray();
        // $resultado = [];
        // foreach ($movies as $movie) {
        //     $resultado[] = new MoviesDTO(
        //         $movie["id"],
        //         $movie["title"],
        //         $movie["year"],
        //         $movie["duration"],
        //         $movie["director_id"]
        //     );
        // }
        // return $resultado;
    }

    /**
     *
     * @param mixed $id
     * @return \Src\DTO\MoviesDTO
     */
    public function find($id): MoviesDTO
    {
        $movie = Movie::findOrFail($id);
        return new MoviesDTO($movie->id, $movie->title, $movie->year, $movie->duration, $movie->director_id);
    }

    public function actors($id): array
    {
        $movies =  Movie::findOrFail($id)->actor;
        $resultado = [];
        foreach ($movies as $movie) {
            $resultado[] = new ActorsDTO(
                $movie->id,
                $movie->name
            );
        }
        return $resultado;
    }

    /**
     *
     * @param mixed $id
     * @return array
     */
    public function findByUser($id): array
    {
        $pepe = [];
        return $pepe;
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function insert(MoviesDTO $movies): bool
    {
        $director = Director::findOrFail($movies->director_id());
        $movie = new Movie();
        $movie->title = $movies->title();
        $movie->year = $movies->year();
        $movie->duration = $movies->duration();
        // $movie->director_id = $movies->director_id();
        $movie->director()->associate($director);
        return $movie->save();
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return array
     */
    public function update(MoviesDTO $movies, $id): MoviesDTO
    {
        $movie = Movie::findOrFail($id);
        $movie->title = $movies->title();
        $movie->year = $movies->year();
        $movie->duration = $movies->duration();
        // $movie->save();
        $movie->update();
        return new MoviesDTO($movie->id, $movie->title, $movie->year, $movie->duration, $movie->director_id);
    }

    /**
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool
    {
        return Movie::destroy($id);
    }
}
