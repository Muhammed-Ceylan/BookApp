<?php

use App\Http\Controllers\admin\author\AuthorIndexController;
use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\publisher\publisherIndexController as PublisherIndexController;
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
    return view('welcome');
});
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [indexController::class, 'index'])->name('index');
    Route::group(['namespace' => 'publisher', 'prefix' => 'publisher', 'as' => 'publisher.'], function () {
        Route::get('/', [PublisherIndexController::class, 'index'])->name('index');
        Route::get('/create', [PublisherIndexController::class, 'create'])->name('create');
        Route::post('/store', [PublisherIndexController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PublisherIndexController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PublisherIndexController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PublisherIndexController::class, 'delete'])->name('delete');
    });
    Route::group(['namespace' => 'author', 'prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', [AuthorIndexController::class, 'index'])->name('index');
        Route::get('/create', [AuthorIndexController::class, 'create'])->name('create');
        Route::post('/store', [AuthorIndexController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AuthorIndexController::class, 'edit'])->name('edit');
        Route::post('/update', [AuthorIndexController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AuthorIndexController::class, 'delete'])->name('delete');

    });
});
