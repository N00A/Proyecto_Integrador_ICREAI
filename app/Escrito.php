<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    
    protected $fillable = ['id', 'descripcion', 'genero_id', 'genero_id'];

    public function users()
    {
        return $this
            ->belongsTo('App\User')
            ->withTimestamps();
    }

    public function genero()
    {
        return $this
            ->belongsTo('App\Genero')
            ->withTimestamps();
    }
}
