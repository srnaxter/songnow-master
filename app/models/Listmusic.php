<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listmusic extends Model {
    protected $table = 'listmusic';
    protected $fillable = ['image', 'name', 'genero', 'anio', 'origin', 'creado', 'duracion', 'lugarencontrado', 'aniocreation', 'recomiendas', 'album', 'youtube', 'valoracion', 'link', 'description'];

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class)->orderBy('created_at', 'asc');
    }
}