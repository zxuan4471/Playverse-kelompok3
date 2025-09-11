<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['RPG', 'Action', 'Puzzle', 'Platformer', 'Racing', 'Strategy'];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => strtolower($cat),
            ]);
        }
    }
}
