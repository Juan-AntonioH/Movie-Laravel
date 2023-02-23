<?php

namespace Src\Service\impl;

use Src\DAO\MovieDAO;
use Src\DTO\MoviesDTO;
use Src\DAO\impl\EloquentMovieDAO;
use Src\Service\MovieService;


class MovieServiceImpl implements MovieService
{
    private MovieDAO $movieDAO;

    function __construct()
    {
        $this->movieDAO = new EloquentMovieDAO();
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->movieDAO->all();
    }

    /**
     *
     * @param mixed $id
     * @return \Src\DTO\MoviesDTO
     */
    public function find($id): MoviesDTO
    {
        return $this->movieDAO->find($id);
    }

    public function actors($id): array
    {
        return $this->movieDAO->actors($id);
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
    public function insert(MoviesDTO $movie): bool
    {
        return $this->movieDAO->insert($movie);
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return array
     */
    public function update(MoviesDTO $movie, $id): MoviesDTO
    {
        return $this->movieDAO->update($movie, $id);
    }
    /**
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool
    {
        return $this->movieDAO->delete($id);
    }
}
