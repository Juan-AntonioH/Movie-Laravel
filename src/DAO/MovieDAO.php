<?php

namespace Src\DAO;

use Src\DTO\MoviesDTO;
use Illuminate\Http\Request;


interface MovieDAO
{
    public function all(): array;
    public function find($id): MoviesDTO;
    public function actors($id): array;
    public function findByUser($id): array;
    public function insert(MoviesDTO $movie): bool;
    public function update(MoviesDTO $request, $id): MoviesDTO;
    public function delete($id): bool;
}
