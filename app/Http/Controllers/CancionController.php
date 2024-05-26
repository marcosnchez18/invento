<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('canciones.index', [

            'canciones' => Cancion::all(),
            'albumes' => Album::all(),
            'artistas' => Artista::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones.create', [
            'albumes' => Album::all(),
            'artistas' => Artista::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'album_id' => 'required|exists:albumes,id',
            'artista_id' => 'required|exists:artistas,id',
            'duracion' => [
                'required',
                'regex:/^\d{2}:\d{2}:\d{2}$/'
            ],
        ]);

        $cancion = new Cancion();
        $cancion->titulo = $validated['titulo'];
        $cancion->album_id = $validated['album_id'];
        $cancion->artista_id = $validated['artista_id'];
        $cancion->duracion = $validated['duracion'];
        $cancion->save();
        session()->flash('success', 'la cancion se ha creado correctamente.');
        return redirect()->route('canciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        return view('canciones.show', [
            'cancion' => $cancion,
            'albumes' => Album::all(),
            'artistas' => Artista::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view('canciones.edit', [
            'cancion' => $cancion,
            'albumes' => Album::all(),
            'artistas' => Artista::all(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancion $cancion)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'album_id' => 'required|exists:albumes,id',
            'artista_id' => 'required|exists:artistas,id',
            'duracion' => [
                'required',
                'regex:/^\d{2}:\d{2}:\d{2}$/'
            ],
        ]);

        $cancion->titulo = $validated['titulo'];
        $cancion->album_id = $validated['album_id'];
        $cancion->artista_id = $validated['artista_id'];
        $cancion->duracion = $validated['duracion'];
        $cancion->save();
        session()->flash('success', 'cancion cambiada correctamente');
        return redirect()->route('canciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        $cancion->delete();
        session()->flash('success', 'la cancion se ha eliminado correctamente.');
        return redirect()->route('canciones.index');
    }
}
