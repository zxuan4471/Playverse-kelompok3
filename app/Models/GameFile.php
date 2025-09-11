<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameFile extends Model
{
    protected $fillable = ['game_id', 'file_path', 'file_type', 'file_size'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
