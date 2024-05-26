<?php

use App\Http\Controllers\CancionController;
use App\Http\Controllers\ProfileController;
use App\Models\Album;
use App\Models\Cancion;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('canciones', CancionController::class)->parameters(['canciones' => 'cancion']);

    Route::get('/albumes-canciones/{album}', function (Album $album) {
        return view('canciones.album', [                   //ruta de canciones que tiene cada album
            'album' => $album,
        ]);
    })->name('canciones.album');


    Route::get('/tengo', function () {
        $albumes = Auth::user()->albumes;

        return view('canciones.tengo', [
            'albumes' => $albumes,

        ]);
    });

});

require __DIR__.'/auth.php';
