<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title', 'slug', 'developer', 'description', 'price',
        'cover_image', 'trailer_url', 'category_id', 'platform_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function screenshots()
    {
        return $this->hasMany(GameScreenshot::class);
    }

    public function files()
    {
        return $this->hasMany(GameFile::class);
    }
}
