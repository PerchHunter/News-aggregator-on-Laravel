<?php

    use App\Http\Controllers\Pages\NewsController;
    use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');

Route::name('page.')
    ->prefix('page/')
    ->group(function() {
        Route::get('news', [NewsController::class, 'index'])->name('news');
        Route::get('news/category/{titleCategory}', [NewsController::class, 'getCategoryNews'])
            ->where('titleCategory', '[a-z]+')->name('categoryNews');
        Route::get('news/category/{titleCategory}/{id}', [NewsController::class, 'getOneNews'])
            ->where(['titleCategory' => '[a-z]+', 'id' => '[0-9]+'])->name('oneNews');
    });



Route::fallback(fn() => view('404'));
