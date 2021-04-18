<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    
    protected $fillable = ['id', 'contenido', 'genero_id'];

    public function escrito()
    {
        return $this
            ->belongsTo('App\Escrito')
            ->withTimestamps();
    }
}
