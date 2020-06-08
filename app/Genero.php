<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    
    protected $fillable = ['id', 'name', 'descripcion'];

    
    public function escrito()
    {
        return $this
            ->hasMany('App\Escrito')
            ->withTimestamps();
    }
}
