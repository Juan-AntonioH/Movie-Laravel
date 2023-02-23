<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actor()
    {
        return $this->belongsToMany(Actor::class);
    }
}
