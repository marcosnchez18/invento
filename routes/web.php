<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\ProfileController;
use App\Models\Album;
use App\Models\Cancion;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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



    Route::get('/albumes-canciones/{album}', function (Album $album) {
        return view('canciones.album', [                   //ruta de canciones que tiene cada album
            'album' => $album,
        ]);
    })->name('canciones.album');




    Route::get('/tengo', function () {
        $albumes = Auth::user()->albumes;           //albunes del usuario actual, los que esten en la tabla biblioteca

        return view('canciones.tengo', [
            'albumes' => $albumes,

        ]);
    });

    Route::post('/añadidos', [BibliotecaController::class, 'realiza'])->name('canciones.añadidos');

    Route::get('/añadidos', function () {
        $albumes = Album::all();

        return view('canciones.añadidos', [
            'albumes' => $albumes,
        ]);
    });



    Route::resource('canciones', CancionController::class)->parameters(['canciones' => 'cancion']);

    Route::resource('albumes', AlbumController::class)->parameters(['albumes' => 'album']);


});

require __DIR__ . '/auth.php';
