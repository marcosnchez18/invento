<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function realiza(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albumes,id',
        ]);

        $registro = Biblioteca::where('user_id', Auth::id())
            ->where('album_id', $request->album_id)
            ->first();

        if ($request->has('tengo')) {

            if (!$registro) {

                DB::table('bibliotecas')->insert([
                    'user_id' => Auth::id(),                          //para insertar siempre de esta forma
                    'album_id' => $request->album_id,
                ]);
                return redirect()->route('canciones.añadidos')->with('success', 'Álbum añadido a tu biblioteca');
            } else {

                return redirect()->route('canciones.añadidos')->with('error', 'El álbum ya está en tu biblioteca');
            }
        } elseif ($request->has('no_tengo')) {

            if ($registro) {

                DB::table('bibliotecas')
                    ->where('user_id', Auth::id())
                    ->where('album_id', $request->album_id)
                    ->delete();

                return redirect()->route('canciones.añadidos')->with('success', 'Álbum eliminado de tu biblioteca');
            } else {

                return redirect()->route('canciones.añadidos')->with('error', 'No tienes este álbum en tu biblioteca');
            }
        } else {

            return redirect()->route('canciones.añadidos')->with('error', 'Acción no válida');
        }
    }











    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Biblioteca $biblioteca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biblioteca $biblioteca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biblioteca $biblioteca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biblioteca $biblioteca)
    {
        //
    }
}
