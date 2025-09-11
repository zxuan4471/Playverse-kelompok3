<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameScreenshot extends Model
{
    protected $fillable = ['game_id', 'image_path'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
