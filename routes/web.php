<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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
    return view('welcome');
});


Route::post('/saveArticle', [ArticleController::class, 'saveArticle'])->name('saveArticle');


Route::get('/showArticles', [ArticleController::class, 'showArticles'])->name('showArticles');


Route::post('/deleteArticles', [ArticleController::class, 'deleteArticles'])->name('deleteArticles');

Route::get('/editeArticle/{id}', [ArticleController::class, 'editeArticle'])->name('editeArticle');

Route::put('/updateArticle/{id}', [ArticleController::class, 'updateArticle'])->name('updateArticle');
