<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//show all post
Route::get('/dashboard/article', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('article.index');

//show 1 post
Route::get('/dashboard/article/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('article.show');

//show create post
Route::get('/article/create/post', [\App\Http\Controllers\ArticleController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('article.create');

//save created post
Route::post('/article/create/post', [\App\Http\Controllers\ArticleController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('article.create');

//show edit post
Route::get('/article/{article}', [\App\Http\Controllers\ArticleController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('article.edit');

//commit edited post
Route::put('/article/{article}', [\App\Http\Controllers\ArticleController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('article.update');

// delete post
Route::delete('/article/{article}', [\App\Http\Controllers\ArticleController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('article.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
