<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escrito extends Model
{
    
    protected $fillable = ['id', 'contenido', 'genero_id'];

    public function escrito()
    {
        return $this
            ->hasMany('App\Escrito')
            ->withTimestamps();
    }
}
