<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Classification;
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
            'game_file' => 'required|file|mimes:zip|max:512000', // zip saja
            'pricing' => 'required|string|in:no-payments,paid,free',
            'visibility' => 'required|string|in:public,restricted,public-final',
            'category_id' => 'required|integer|exists:categories,id',
            'platform_id' => 'required|integer|exists:platforms,id',
            'classification_id' => 'required|integer|in:1,2'
        ]);

        // Upload cover image
        $coverPath = $request->file('cover_image')->store('covers', 'public');

        // Buat slug unik
        $slug = Str::slug($validated['title'], '-');
        $count = Game::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        // Buat slug

        // Path ekstraksi
        $extractPath = public_path('games/' . $slug);
        if (!File::exists($extractPath)) {
            File::makeDirectory($extractPath, 0755, true);
        }

        // Ekstrak ZIP
        $zip = new ZipArchive;
        if ($zip->open($request->file('game_file')->getRealPath()) === TRUE) {
            $zip->extractTo($extractPath);
            $zip->close();
            $gameFilePath = 'games/' . $slug . '/index.html';
        }
        // Simpan data game dulu tanpa path file HTML
        $game = new Game();
        $game->title = $validated['title'];
        $game->slug = $slug;
        $game->description = $validated['description'];
        $game->cover_image = $coverPath;
        $game->pricing = $validated['pricing'];
        $game->visibility = $validated['visibility'];
        $game->category_id = $validated['category_id'];
        $game->platform_id = $validated['platform_id'];
        $game->classification_id = $validated['classification_id'];
        $game->game_file = $gameFilePath;
        // Upload screenshot
        $game->save();

        // Upload screenshot setelah game disimpan
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $game->screenshots()->create([
                    'screenshots_path' => $screenshot->store('screenshots', 'public')
                ]);
            }
        }

        // Ekstrak ZIP sekali saja
        $zipFile = $request->file('game_file');
        $extractPath = public_path('games/' . $slug);

        if (!File::exists($extractPath)) {
            File::makeDirectory($extractPath, 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFile->getRealPath()) === TRUE) {
            $zip->extractTo($extractPath);

            // Cari index.html di dalam ZIP (bisa di folder atau root)
            $indexPath = null;
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $name = $zip->getNameIndex($i);
                if (strtolower(basename($name)) === 'index.html') {
                    $indexPath = 'games/' . $slug . '/' . $name;
                    break;
                }
            }

            $zip->close();

            if ($indexPath) {
                $game->game_file = $indexPath;
                $game->save();
            }
        }

    }
    public function create()
    {
        $platforms = Platform::all();
        $classifications = Classification::all();
        return view('development.import.import-game', compact('platforms', 'classifications'));
    }

    public function show($id)
    {
        $game = Game::with(['category', 'platform', 'screenshots'])->findOrFail($id);
        return view('games.showgame', compact('game'));
    }
}
