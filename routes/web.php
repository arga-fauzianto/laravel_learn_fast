<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ListCardController;

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk halaman register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman welcome
Route::get('/', function () {
    return view('layouts.app'); // Pastikan view ini ada di resources/views/welcome.blade.php
})->name('welcome');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

// Middleware untuk autentikasi
Route::middleware(['auth'])->group(function () {
    // Board Routes
    Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');
    Route::get('/boards/create', [BoardController::class, 'create'])->name('boards.create');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');
    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    Route::delete('/boards/{board}', [BoardController::class, 'destroy'])->name('boards.destroy');

    // List Routes
    Route::get('/boards/{board}/lists/create', [ListCardController::class, 'create'])->name('lists.create');
    Route::post('/boards/{board}/lists', [ListCardController::class, 'store'])->name('lists.store');
    Route::delete('/lists/{list}', [ListCardController::class, 'destroy'])->name('lists.destroy');
    Route::resource('boards.lists', ListCardController::class);

    // Card Routes
    Route::get('/lists/{list}/cards/create', [CardController::class, 'create'])->name('cards.create');
    Route::post('/lists/{list}/cards', [CardController::class, 'store'])->name('cards.store');
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
    // Tambahkan route ini ke grup middleware auth
    Route::get('/cards/{card}', [CardController::class, 'show'])->name('cards.show');

    Route::resource('boards.lists', ListCardController::class)->except(['index', 'show']);

    Route::post('cards/store', [CardController::class, 'store'])->name('cards.store');

    Route::resource('boards.lists.cards', CardController::class);

    Route::resource('boards.lists.cards', CardController::class);


    // Label Routes
    Route::get('/cards/{card}/labels/create', [LabelController::class, 'create'])->name('labels.create');
    Route::post('/cards/{card}/labels', [LabelController::class, 'store'])->name('labels.store');

    Route::post('boards/{board}/lists', [ListCardController::class, 'store'])->name('boards.lists.store');


    Route::post('/update-card-position', [CardController::class, 'updatePosition'])->name('cards.updatePosition');

    

    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    Route::get('/cards/{card}', [CardController::class, 'show'])->name('cards.show');

    // Checklist Routes
    Route::get('/cards/{card}/checklists/create', [ChecklistController::class, 'create'])->name('checklists.create');
    Route::post('/cards/{card}/checklists', [ChecklistController::class, 'store'])->name('checklists.store');
});

