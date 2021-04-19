<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    
    protected $fillable = ['id', 'contenido', 'genero_id','user_id', 'created_at'];

    public function escrito()
    {
        return $this
            ->belongsTo('App\Escrito')
            ->withTimestamps();
    }
}
