<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    
    protected $fillable = ['id', 'descripcion', 'genero_id'];

    public function genero()
    {
        return $this
            ->belongsTo('App\Genero')
            ->withTimestamps();
    }
}
