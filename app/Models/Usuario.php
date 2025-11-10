<?php

namespace App\Models;

use App\Models\Dato;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    
    use SoftDeletes;

    protected $hidden= ["password"]; 


    public function datos()
    {
        return $this->hasMany(Dato::class);

    }
}
