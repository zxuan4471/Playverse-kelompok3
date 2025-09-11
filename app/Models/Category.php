<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
