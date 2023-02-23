<?php

namespace Src\DTO;

use JsonSerializable;

class ActorsDTO implements JsonSerializable
{
    function __construct(private ?int $id, private string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function id(): int
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}
