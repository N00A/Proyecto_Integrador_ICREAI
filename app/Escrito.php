<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escrito extends Model
{
    
    protected $fillable = ['id', 'texto', 'user_id', 'genero_id'];

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
    public function foro()
    {
        return $this
            ->hasMany('App\Foro')
            ->withTimestamps();
    }
}
