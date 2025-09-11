<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    public function run()
    {
        $platforms = ['Web Build', 'Unity', 'Godot', 'Construct 3'];

        foreach ($platforms as $plat) {
            Platform::create([
                'name' => $plat,
                'slug' => strtolower(str_replace(' ', '-', $plat)),
            ]);
        }
    }
}
