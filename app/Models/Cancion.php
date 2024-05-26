<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    protected $table = 'canciones';


    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }

    public function radio_o_lista()
    {
        $cancion = Cancion::where('id', $this->id)->first();
            $nombre = $cancion->album_id;
            $album = Album::find($nombre);
            if ($album->asignable_type == 'App\Models\Radio' ) {
                return 'Radio';
            }
            else {
                return 'Playlist';
            }

    }


    public function nombre_emisora()
    {
        $cancion = Cancion::where('id', $this->id)->first();
            $nombre = $cancion->album_id;
            $album = Album::find($nombre);
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
