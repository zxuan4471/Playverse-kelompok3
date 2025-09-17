<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameScreenshot;
use Illuminate\Http\Request;
use App\Http\Controllers\ImportGameController;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'platform_id' => 'required|exists:platforms,id',
            'category_id' => 'required|exists:categories,id',
            'trailer_url' => 'nullable|url',
            'game_file' => 'required|file|mimes:zip,rar,7z|max:512000',
            'screenshots.*' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Simpan game
        $game = Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'platform_id' => $request->platform_id,
            'category_id' => $request->category_id,
            'trailer_url' => $request->trailer_url,
        ]);

        // Upload file game
        if ($request->hasFile('game_file')) {
            $path = $request->file('game_file')->store('game_files', 'public');
            $game->files()->create([
                'file_path' => $path,
                'file_type' => $request->file('game_file')->getClientOriginalExtension(),
                'file_size' => $request->file('game_file')->getSize(),
            ]);
        }

        // Upload screenshots
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $path = $screenshot->store('game_screenshots', 'public');
                GameScreenshot::create([
                    'game_id' => $game->id,
                    'screenshot_path' => $path,
                ]);
            }
        }

      return redirect()->route('games.show', $game->id)
    ->with('success', 'Game berhasil dipublikasikan!');

    }

public function show($id)
{
    $game = Game::with(['category', 'platform', 'screenshots'])->findOrFail($id);
    return view('games.showgame', compact('game'));
}
}
