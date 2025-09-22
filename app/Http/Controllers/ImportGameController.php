<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Category;
use App\Models\Platform;
use ZipArchive;
use File;

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
            'game_file' => 'required|file|mimes:zip|max:512000',
            'pricing' => 'required|string|in:no-payments,paid,free',
            'visibility' => 'required|string|in:public,restricted,public-final',
            'category_id' => 'required|integer|exists:categories,id',
            'platform_id' => 'required|integer|exists:platforms,id',
        ]);

        // Upload cover image
        $coverPath = $request->file('cover_image')->store('covers', 'public');

        // Buat slug unik
        $slug = Str::slug($validated['title'], '-');
        $count = Game::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // Path ekstraksi
        $extractPath = public_path('games/' . $slug);
        if (!File::exists($extractPath)) {
            File::makeDirectory($extractPath, 0755, true);
        }

        // Ekstrak ZIP dan cari index.html
        $gameFilePath = null;
        $zipFile = $request->file('game_file');
        $zip = new ZipArchive;
        if ($zip->open($zipFile->getRealPath()) === TRUE) {
            $zip->extractTo($extractPath);

            // Cari index.html di dalam ZIP (root atau subfolder)
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $name = $zip->getNameIndex($i);
                if (strtolower(basename($name)) === 'index.html') {
                    $gameFilePath = 'games/' . $slug . '/' . $name;
                    break;
                }
            }

            $zip->close();
        }

        // Simpan data game
        $game = new Game();
        $game->title = $validated['title'];
        $game->slug = $slug;
        $game->description = $validated['description'];
        $game->cover_image = $coverPath;
        $game->pricing = $validated['pricing'];
        $game->visibility = $validated['visibility'];
        $game->category_id = $validated['category_id'];
        $game->platform_id = $validated['platform_id'];
        $game->game_file = $gameFilePath; // path index.html
        $game->save();

        // Upload screenshot setelah game disimpan
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $game->screenshots()->create([
                    'screenshots_path' => $screenshot->store('screenshots', 'public')
                ]);
            }
        }
    }

    public function create()
    {
        $platforms = Platform::all();
        return view('development.import.import-game', compact('platforms'));
    }

    public function show($id)
    {
        $game = Game::with(['category', 'platform', 'screenshots'])->findOrFail($id);
        return view('games.showgame', compact('game'));
    }
    public function index()
{
    $games = Game::with(['category', 'platform'])->latest()->get();
    return view('index', compact('games'));
}

}
