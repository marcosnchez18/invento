<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    use HasFactory;


    public function albumes()
    {
        return $this->morphMany(Album::class, 'asignable');
    }
}
