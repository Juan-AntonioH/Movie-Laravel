<?php

namespace App\Http\Controllers\Api;

use App\Models\Director;
use App\Models\Movie;
use Src\DTO\MoviesDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Service\MovieService;
use App\Http\Controllers\Controller;
use Src\Service\impl\MovieServiceImpl;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    private MovieService $service;
    function __construct()
    {
        // $this->middleware(
        //     'auth:sanctum',
        //     ['except' => ['index', 'show']]
        // );
        //     $this->middleware(
        //     'rol:admin',
        //     ['only' => ['index']]
        // );


        // $this->middleware(
        //     ['auth:sanctum',
        //     ['except' => ['index', 'show']],            'rol:admin',
        //     ['only' => ['index']]]
        // );
        $this->service = new MovieServiceImpl();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return response()->json(Movie::get(), 200);
        return response()->json($this->service->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        // $movie = new Movie();
        // $movie->title = $request->title;
        // $movie->year = $request->year;
        // $movie->duration = $request->duration;
        // $movie->director()->associate(Director::findOrFail($request->director_id));
        // $movie->save();
        // return response()->json($movie, 201);

        $movie = new MoviesDTO(
            null,
            $request->title,
            $request->year,
            $request->duration,
            $request->director_id
        );
        return response()->json($this->service->insert($movie), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $movie = Movie::findOrFail($id);
        // return response()->json($movie, 200);
        return response()->json($this->service->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, $id)
    {
        // $movie = Movie::findOrFail($id);;
        // $movie->title = $request->title;
        // $movie->year = $request->year;
        // $movie->duration = $request->duration;
        // $movie->director_id = $request->director_id;
        // $movie->save();
        // return response()->json($movie, 201);

        $movie = new MoviesDTO(
            null,
            $request->title,
            $request->year,
            $request->duration,
            $request->director_id
        );
        return response()->json($this->service->update($movie,$id), 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // response()->json(Movie::destroy($id),200);
        response()->json($this->service->delete($id),200);
    }

    public function actors($id)
    {
        return response()->json($this->service->actors($id));
        // return response()->json(Movie::findOrFail($id)->actor, 200);
    }
    public function directors($id)
    {
        return response()->json(Movie::findOrFail($id)->director, 200);
    }
}
