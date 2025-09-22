<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ImportGameController;
use App\Http\Controllers\PublishGameController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

// ================== STATIC VIEW ROUTES ==================
Route::get('/assets', fn() => view('assets'));
Route::get('/review', fn() => view('admin.review'));
Route::get('/games', fn() => view('games.list'))->name('games.list');
Route::get('/game', fn() => view('games.showgame'));
Route::get('developer-dashboard', fn() => view('development.developer-mode'));
Route::get('/all_game', fn() => view('semua-game'));
Route::get('/dashboard-admin', fn() => view('admin.dashboard-admin'));
Route::get('/management-user', fn() => view('admin.user-management'));
Route::get('/management-game', fn() => view('admin.game-management'));
Route::get('/penghasilan', fn() => view('development.penghasilan'));
Route::get('/pendaftaran-daveloper', fn() => view('development.pendaftaran-davelopers'));
Route::get('/report', fn() => view('admin.laporan'));
Route::get('/analisis', fn() => view('admin.management-analistik'));
Route::get('/management-uang', fn() => view('admin.management-uang'));
Route::get('/login-admin', fn() => view('admin.login-admin'));
Route::get('/game-saya', fn() => view('development.game-saya'));
Route::get('/asset-saya', fn() => view('development.assets-saya'));
Route::get('/publish-asset', fn() => view('development.import.import-asset'));
Route::get('/management-asset', fn() => view('admin.asset-management'));
Route::get('/setting', fn() => view('setting-user'));
Route::get('/detail-asset', fn() => view('detail-assets'));

// ================== AUTH ==================
Route::get('/login', [AuthController::class, 'showSigninForm'])->name('login');
Route::post('/login', [AuthController::class, 'signinProses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'showSignupForm'])->name('register');
Route::post('/register', [AuthController::class, 'signupProses'])->name('register.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== GAME SHOW ==================
Route::get('/games/{id}', [ImportGameController::class, 'show'])->name('games.show');
Route::get('/', [ImportGameController::class, 'index'])->name('home');
// ================== GAME ==================
Route::get('/import-game', [ImportGameController::class, 'create'])->name('import.create');
Route::post('/import-game', [ImportGameController::class, 'store'])->name('import.store');
Route::get('/games/create', [ImportGameController::class, 'create'])->name('games.create');
Route::post('/games/store', [ImportGameController::class, 'store'])->name('games.store');


