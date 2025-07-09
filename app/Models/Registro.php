<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public function usuario()
    {
        return $this->belongsTo("usuario");
    }
}
