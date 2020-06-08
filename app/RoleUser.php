<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;


class RoleUser extends Pivot
{
    
    protected $fillable = ['id', 'role_id', 'user_id','email'];

    public function roles()
    {
        return $this->belongsTo('App\Role');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
