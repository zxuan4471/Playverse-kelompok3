<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Classification;

class ImportGameController extends Controller
{
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'screenshots.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'game_file' => 'required|file|mimes:zip,rar,7z|max:512000',
            'pricing' => 'required|string|in:no-payments,paid,free',
            'visibility' => 'required|string|in:public,restricted,public-final',
            'category_id' => 'required|integer|exists:categories,id',
            'platform_id' => 'required|integer|exists:platforms,id',

        ]);

        // Upload cover image
        $coverPath = $request->file('cover_image')->store('covers', 'public');

        // Upload game file
        $gamePath = $request->file('game_file')->store('games', 'public');

        // Upload screenshots (bisa lebih dari 1)
        $screenshotPaths = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotPaths[] = $screenshot->store('screenshots', 'public');
            }
        }

$slug = Str::slug($validated['title'], '-');

// Cek apakah slug sudah ada
$count = Game::where('slug', 'like', $slug . '%')->count();
if ($count > 0) {
    $slug .= '-' . ($count + 1);
}

        // Simpan game
        $game = new Game();
        $game->title = $validated['title'];
        $game->slug = $slug;
        $game->description = $validated['description'];
        $game->cover_image = $coverPath;
        $game->game_file = $gamePath;
        $game->pricing = $validated['pricing'];
        $game->visibility = $validated['visibility'];
        $game->category_id = $validated['category_id'];
        $game->platform_id = $request->platform_id;
        $classifications = [
            (object) ['id' => 1, 'name' => 'Games — A work of software you can play', 'value' => 'games'],
            (object) ['id' => 2, 'name' => 'Game assets — Art, sound, and code for games', 'value' => 'assets'],
        ];

        $game->save();

        // Jika ingin simpan screenshots ke tabel lain, bisa loop di sini
        // Misal $game->screenshots()->createMany($screenshotPaths);

        return redirect()->back()->with('success', 'Game berhasil di-upload!');
    }
    public function create()
    {
        $platforms = Platform::all();

        // kalau classification static, bisa langsung array
        $classifications = [
            (object) ['value' => 'games', 'name' => 'Games — A work of software you can play'],
            (object) ['value' => 'assets', 'name' => 'Game assets — Art, sound, and code for games'],
        ];

        return view('development.import.import-game', compact('platforms', 'classifications'));
    }

}
