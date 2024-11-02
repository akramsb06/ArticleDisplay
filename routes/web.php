<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
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

// the main route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// the login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// the register route
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

require __DIR__.'/auth.php';


// the dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// authentication middleware to restrict access to authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Article routes within the auth middleware to restrict access
    Route::post('/saveArticle', [ArticleController::class, 'saveArticle'])->name('saveArticle');


    Route::get('/showArticles', [ArticleController::class, 'showArticles'])->name('showArticles');


    Route::post('/deleteArticles', [ArticleController::class, 'deleteArticles'])->name('deleteArticles');

    Route::get('/editeArticle/{id}', [ArticleController::class, 'editeArticle'])->name('editeArticle');

    Route::put('/updateArticle/{id}', [ArticleController::class, 'updateArticle'])->name('updateArticle');

});


