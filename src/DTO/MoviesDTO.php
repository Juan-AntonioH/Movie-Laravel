<?php

namespace Src\DTO;

use App\Models\Director;
use JsonSerializable;

class MoviesDTO implements JsonSerializable
{
    function __construct(private ?int $id, private string $title, private int $year, private int $duration, private int $director_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->duration = $duration;
        $this->director_id = $director_id;
    }
    public function id(): int
    {
        return $this->id;
    }
    public function title(): string
    {
        return $this->title;
    }
    public function year(): int
    {
        return $this->year;
    }
    public function duration(): int
    {
        return $this->duration;
    }
    public function director_id(): int
    {
        return $this->director_id;
    }


    /**
     * Especifica los datos que deberían serializarse para JSON
     * Serializa el objeto a un valor que puede ser serializado de forma nativa por json_encode().
     * @return mixed Devuelve los datos que pueden ser serializados por json_encode(), los cuales son un valor de cualquier tipo distinto de `resource`.
     */
    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "year" => $this->year,
            "duration" => $this->duration,
            "director_id" => $this->director_id,
            "director_name" => Director::findOrFail($this->director_id)->name
        ];
    }
}
