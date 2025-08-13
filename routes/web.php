<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('index'); // atau nama view halaman utamamu
});


Route::get('/assets', function () {
    return view('assets');
});

Route::get('/games', function () {
    return view('games.list');
})->name('games.list');

// Halaman detail game
Route::get('/game', function () {
    return view('games.showgame');
});

Route::get('developer', function () {
    return view('development.developer-mode');
});

Route::get('/all_game', function () {
    return view('semua-game');
});

Route::get('/import-game', function () {
    return view('development.import.import-game');
});

Route::get('/detail-game', function () {
    return view('development.import.detail-game');
});

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('/management-user', function () {
    return view('admin.user-management');
});