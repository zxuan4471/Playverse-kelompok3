<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    public function run()
    {
        $platforms = ['PC', 'Console', 'Mobile'];
        foreach ($platforms as $name) {
            Platform::firstOrCreate(['name' => $name]);
        }
    }
}
