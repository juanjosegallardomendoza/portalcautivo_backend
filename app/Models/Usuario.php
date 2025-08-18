<?php

namespace App\Models;

use App\Models\Dato;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $hidden= ["password"]; 


    public function datos()
    {
        return $this->hasMany(Dato::class);

    }
}
