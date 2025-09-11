<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = ['name', 'slug'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
