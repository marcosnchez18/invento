<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';


    public function users()
    {
        return $this->belongsToMany(User::class, 'bibliotecas');
    }

    public function canciones()
    {
        return $this->hasMany(Cancion::class);
    }

    public function asignable()
    {
        return $this->morphTo();
    }

    public function nombres_canciones()
    {
        $canciones = Cancion::where('album_id', $this->id)->get();
        $nombres_canciones = '';
        foreach ($canciones as $cancion) {
            $nombre = $cancion->titulo;

            $nombres_canciones .= '<li>' . $nombre . '</li>';
        }
        return $nombres_canciones ? '<ul>' . $nombres_canciones . '</ul>' : 'Sin canciones';
    }


    function duracion()
    {
        $duracionTotal = DB::table('canciones')->selectRaw('SUM(duracion) as total_duration')->first()->total_duration;
        $totalInterval = CarbonInterval::create($duracionTotal);
        return $totalInterval;
    }


    public function radio_o_lista()
    {
        $album = Album::where('id', $this->id)->first();
            if ($album->asignable_type == 'App\Models\Radio' ) {
                return 'Radio';
            }
            else {
                return 'Playlist';
            }

    }


    public function nombre_radio_o_lista()
    {
        $album = Album::where('id', $this->id)->first();
            if ($album->asignable_type == 'App\Models\Radio' ) {
                $n = Radio::find($album->asignable_id);
                return $n->nombre;
            }
            else {
                $n = Playlist::find($album->asignable_id);
                return $n->nombre;
            }

    }
}
