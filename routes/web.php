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
Route::get('/games/{id}', function ($id) {
    return view('games.show', ['id' => $id]);
})->name('games.show');