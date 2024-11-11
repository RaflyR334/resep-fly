<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin Atau Backend
// Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
//     Route::get('/', function (){
//         return view('admin.index');
//     });
// });

Route::group(['prefix'=>'admin', 'middleware'=>['auth',IsAdmin::class]], function (){
    Route::get('/',function(){
        return view('admin.indexadmin');
    });

    // Route Lainnya ....
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('resep', App\Http\Controllers\ResepController::class);
    Route::resource('bahan', App\Http\Controllers\BahanController::class);
});


Route::get('/', function () {
    return view('index');
})->name('recipes.searchForm');


Route::get('search', [FrontController::class, 'search'])->name('resep.search');
Route::get('about', function () {
    return view('about');})->name('about');

