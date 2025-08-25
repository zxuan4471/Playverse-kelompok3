<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('index'); // atau nama view halaman utamamu
});


Route::get('/assets', function () {
    return view('assets');
});

Route::get('/review', function () {
    return view('admin.review');
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

Route::get('/management-game', function () {
    return view('admin.game-management');
});

Route::get('/publish-game', function () {
    return view('development.import.publish-game');
});

Route::get('/penghasilan', function () {
    return view('development.penghasilan');
});

Route::get('/pendaftaran-daveloper', function () {
    return view('development.pendaftaran-davelopers');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/report', function () {
    return view('admin.laporan');
});

Route::get('/login-admin', function () {
    return view('admin.login-admin');
});